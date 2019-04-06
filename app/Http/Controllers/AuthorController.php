<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Resources\Failed;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Resources\Success;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all("id", "name");
        return CategoryResource::collection($authors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('put')) {
            if (Author::where('id', $request->id)->exists()) {
                $author = Author::findOrFail($request->id);
                $author->id = $request->id;
            } else {
                return Failed("");
            }
        } else {
            $author = new Author;
        }
        $author->name = $request->name;
        if ($author->save()) {
            return new Success('');
        } else {
            return new Failed('');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Author::where('id', $id)->exists()) {
            return new CategoryResource(Author::findOrFail($id));
        } else {
            return new Failed('');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Author::where('id', $id)->exists()) {
            $author = Author::where('id', $id);
            $author->delete();
            return new Success('');
        } else {
            return new Failed('');
        };
    }
}
