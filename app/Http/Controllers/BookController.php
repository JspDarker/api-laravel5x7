<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use App\Book;

/**
 * Class BookController
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        // get All list Books
        $books = Book::paginate(7);

        // return collection of Books as a resource
        return BookResource::collection($books);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // update a or create a book
        $book = $request->isMethod('put')
            ? Book::findOrFail($request->book_id)
            : new Book;

        $book->name = $request->input('name');
        $book->price = $request->input('price');
        $book->desc_book = $request->input('desc_book');

        if ($book->save()) {
            return new BookResource($book);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return BookResource
     */
    public function show($id)
    {
        // get a book
        $book = Book::findOrFail($id); // if not found ->load page error 404
//        $book = Book::find($id); // using custom data response not found

        // return a book as resource
        return new BookResource($book);

//        if ($book) {
//            // return a book as resource
//            return new BookResource($book);
//        }
//        return BookResource::notFound();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if ($book->delete()) {
            return new BookResource($book);
        }
    }

    // get alls
    // get single
    // create
    // edit
    // delete
}
