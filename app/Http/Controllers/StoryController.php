<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use App\Http\Resources\Story as StoryResource;
use App\Http\Requests\StoryRequest;
use App\Http\Resources\Failed;
use App\Http\Resources\Success;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listStory = Story::with('category', 'author')->get();
        return StoryResource::collection($listStory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $story = new Story;
        $story->name = $request->input('name');
        $story->category_id = $request->input('category_id');
        $story->author_id = $request->input('author_id');
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
        //
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
