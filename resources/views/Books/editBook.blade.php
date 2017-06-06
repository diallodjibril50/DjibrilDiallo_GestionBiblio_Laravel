<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
      <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesone.min.css">
        <div class="container">
        {{--Header Finished--}}

        <div><h1>Edit {{ $book->title }}</h1></div>
        {!! Form::model($book, ['route' => ['book.update', $book->id ], 'method'=>'PUT']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title :') !!}
                {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description :') !!}
                {!! Form::textarea('description', null,  ['class'=>'form-control', 'placeholder'=>'Description']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('author', 'Author name :') !!}
                {!! Form::text('author', null,  ['class'=>'form-control', 'placeholder'=>'Author Name']) !!}
            </div>
             <br>
            <div class="form-group">
                {!! Form::submit( 'Update', ['class'=>'btn btn-toolbar']) !!} <button class="btn btn-toolbar pull-right"><a href="/book">Back to Home</a></button>            </div>

            {!! Form::close() !!}
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {{--Footer Started--}}
     </div>
</body>
</html>