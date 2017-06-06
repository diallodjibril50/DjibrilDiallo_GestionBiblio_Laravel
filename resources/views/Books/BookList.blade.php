<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
    <body>
          <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesone.min.css">
    <div class="container">
        {{--Header Started--}}

        <div class="btn btn-block"><a href="{{ route('book.create')  }}"><h2>Ajouter un nouveau livre</h2></a></div>
        @foreach( $allbook as $book )
            <hr>
            <div class="row">
            
            <div><h1>{!! HTML::linkRoute('book.show', $book->title, array($book->id)) !!}</h1></div>
            <div>{{ $book->description }}</div>
            <div class="pull-center"><em>{{'Publier par-'. $book->author }}</em>
                <div>    {!! HTML::linkRoute('book.edit', 'Editer', array($book->id), ['class'=>"btn btn-success"]) !!}</div></br>
                {!! Form::open(['route' => ['book.destroy', $book->id], 'method' => 'delete']) !!}
                <input type="submit" class="btn btn-danger dropdown-toggle" value="Supprimer">
               
                {!!Form::close() !!}
                {!! Form::close() !!}
            </div>
            </div>
        @endforeach

        {{--Footer Finished--}}
    </div>
    </body>
</html>
