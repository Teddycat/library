<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use League\Flysystem\Exception;
use Library\Author;
use Library\Book;
use Library\Http\Requests;
use Library\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class AuthorsController extends Controller
{
    /**
     * Get list of authors in order by alphabet
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $author = new Author();
        return view('library', ['authors' => $author->getAllAuthors()]);
    }

    /**
     * Get new author from request and store it to DB
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $author = new Author();
        try {
            var_dump($author->addAuthor($request->input('author')));
            return Redirect::back();
        } catch (Exception $e) {
            echo 'Sorry, something going wrong';
        }
    }

    /**
     * Delete author and all his books
     * @param Request $request
     * @return string
     */
    public function deleteAuthor(Request $request)
    {
        $author = new Author();
        $books = new Book();
        try {
            $author->deleteAuthor($request->input('deleteSubject'));
            $books->deleteBooksByAuthor($request->input('deleteSubject'));
            $afterDelete = ['result' => true];
        } catch (Exception $e) {
            $afterDelete = ['result' => false];
        }
        return json_encode($afterDelete);
    }

}
