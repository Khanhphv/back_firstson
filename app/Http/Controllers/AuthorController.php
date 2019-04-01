<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function createAuthor( Request $author_name) {
        $author = Author::create($author_name->all());
        return response()->json([
            $author
        ], 200);
    }
    public function getAll () {
        $listAuthor = Author::all();
        return response()->json(
            $listAuthor
        , 200);
    }
}