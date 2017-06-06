<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\requests\PublishBookRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\storage;
use Illuminate\Http\Request;
use App\book;


class BookController extends Controller
{
    	public function index()
	{
		
        //Select all records from books table via Book method
		$allbook = book::all();    //Eloquent ORM method to return all matching results
        
        //Redirecting to bookList.blade.php with $allBooks       
        return View('Books.BookList', compact('allbook'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
		public function create()
	{
        //Redirecting to addBook.blade.php 
		return view('Books.addBook');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PublishBookRequest $requestData)
	{
        //Insert Query
        $book = new book;
        $book->title= $requestData['title'];
        $book->description= $requestData['description'];
        $book->author= $requestData['author'];
        $book->save();

        //Send control to index() method where it'll redirect to bookList.blade.php
        return redirect()->route('book.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function show($id)
	{
		$book = book::find($id);

        //Redirecting to showBook.blade.php with $book variable
        return view('Books.showBook')->with('book',$book);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
		public function edit($id)
	{
        //Get Result by targeting id
        $book = book::find($id);

        //Redirecting to editBook.blade.php with $book variable
        return view('Books.editBook')->with('book',$book);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, PublishBookRequest $requestData)
	{
        $book = book::find($id);

        //Update Query
        $book->title = $requestData['title'];
        $book->description = $requestData['description'];
        $book->author = $requestData['author'];
        $book->save();

        //Redirecting to index() method of BookController class
        return redirect()->route('book.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

		public function destroy($id)
    {
        //find result by id and delete 
        book::find($id)->delete();

        //Redirecting to index() method
        return redirect()->route('book.index');
    }

}
