<?php

namespace Library;

use DB;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    /**
     * get author by id
     * @param $id
     * @return mixed
     */
    public function getAuthor($id)
    {
        $author = DB::table('authors')->select('name')->where(['id' => $id])->first();
        return $author->name;
    }

    public function getAllAuthors()
    {
        return DB::table('authors')->select()->orderBy('name')->get();
    }

    /**
     * add new author to DB
     * @param $name
     * @return mixed
     */
    public function addAuthor($name)
    {
        return DB::table('authors')->insert(
            ['name' => $name]
        );
    }

    /**
     * Delete author from DB
     * @param $id
     * @return mixed
     */
    public function deleteAuthor($id)
    {
        return DB::table('authors')->where(['id' => $id])->delete();
    }

}
