<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;
use App\Http\Resources\Story as StoryCollection;

class StoryController extends Controller
{
    //get all story
    public function getListAllStory()
    {
        $listStory = Story::with('category','author')->get();
        return StoryCollection::collection($listStory);

    }

    /*
     * request sample
     * name
     * status
     * author_id
     * category_id
     */
    public function addStory(Request $rq)
    {
        $story = new Story;
        if ($this->validateData($rq)) {
            $story->story_name  = $rq->name;
            $story->status      = $rq->status;
            $story->author_id   = $rq->author_id;
            $story->category_id = $rq->category_id;
            $story->save();
        }
    }

    private function validateData($param)
    {
        if ($param->name && $param->stauts && $param->author_id && $param->category_id) {
            return true;
        } else {
            return false;
        }
    }
}
