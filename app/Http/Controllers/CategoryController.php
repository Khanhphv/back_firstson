<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Resources\Failed;
use App\Http\Resources\Success;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get Categories
        $category = Category::all('id', 'name');
        return CategoryResource::collection($category);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //        $validated = $request->validated();
        $category = $request->isMethod('put') ? Category::findOrFail($request->id) : new Category;
        if ($request->isMethod('put')) {
            $category->id = $request->input('id');
        }
        $category->name = $request->input('name');
        if ($category->save()) {
            return new Success('');
        } else return new Failed('');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return  new CategoryResource($category);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', '=', $id)->exists();
        if ($category) {
            $resutl = Category::where('id','=',$id)->delete();
            return new Success('');
        }
        return new Failed('');
    }
}
