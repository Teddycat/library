<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;

use Library\Book;
use Library\Author;
use Library\Http\Requests;
use Library\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class BooksController extends Controller
{
    public function index($id)
    {
        $books = new Book();
        $author = new Author();
        return view('books', ['books' => $books->getBooksByAuthor($id), 'author' => $author->getAuthor($id), 'authorId' => $id]);
    }

    /**
     * Prepare to view books of author in JSON. Ready to use for RESTful API
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toJson($id)
    {
        $books = new Book();
        $listBooks = json_encode($books->getBooksByAuthor($id), JSON_FORCE_OBJECT);
        return view('jsonBooks', ['books' => $listBooks]);
    }

    /**
     * Get new book info from request and store it to DB. Author' id already included in request parameters
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $books = new Book();
        $books->addBook($request->input());
        return Redirect::back();
    }

    /**
     * Delete one book from selected author
     * @param Request $request
     * @return string
     */
    public function deleteBook(Request $request)
    {
        $books = new Book();
        try {
            $books->deleteBook($request->input('deleteSubject'));
            $afterDelete = ['result' => true];
        } catch (Exception $e) {
            $afterDelete = ['result' => false];
        }
        return json_encode($afterDelete);
    }
}
