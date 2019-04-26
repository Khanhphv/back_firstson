<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Story;
use App\Http\Resources\Story as StoryResource;
use App\Http\Requests\StoryRequest;
use App\Http\Resources\Failed;
use App\Http\Resources\Success;
use App\Http\Controllers\CategoryController as Category;
use App\Repositories\StoryRepositories;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $repo = new StoryRepositories();
        $listRepo = $repo->getList(20);
        return response()->json([$listRepo],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $story = new Story;
        $story->name = $request->input('name');
        $story->category_id = $request->input('category_id');
        $story->author_id = $request->input('author_id');
        $khanh = 'Khanh';
        if (!$category->isExist($story->category_id)) {
            return new Failed('');
        }
        $story->likes = 0;
        $story->views = 0;
        $story->status = 0;
        if($story->save()) {
            return new Success('');
        }else{
            return new Failed('');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repo = new StoryRepositories();
        $listRepo = $repo->getIndex($id);
        return response()->json([$listRepo],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "khdan";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'dsadasd';
    }
}
