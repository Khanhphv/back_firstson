<?php


namespace App\Repositories;

use App\Object\ResultObject ;
use App\Object\StoryObject;
use App\Story;
use http\Exception;
class StoryRepositories
{

    public function getList($limit =0){
        $result = new ResultObject();
        $storyFomat = new StoryObject();
        try {
            if($limit ===0){
                $listStory = Story::with('category', 'author')->get();
            } else {
                $listStory = Story::with('category', 'author')->paginate($limit);
            };
            if ($listStory){
                $data = [];
                foreach ($listStory as $story){
                    $tmp = new \stdClass();
                    $tmp->id = $story->id;
                    $tmp->name = $story->name;
                    $tmp->category = $story->category->name;
                    $tmp->author = $story->author->name;
                    $tmp->status = $story->status;
                    $tmp->updated_at = $story->updated_at;
                    array_push($data, $tmp);
                }
                $result->result = $data;
                $result->message = "Get list story";
                $result->messageCode = 1;
            }
        } catch (Exception $exception){}
        return $result;
    }

    public function getIndex($id = 0){
        $result = new ResultObject();
        try {
            $story = Story::findOrFail($id);
            if($story){
                $result->messageCode = 1;
                $result->message = "Get success";
                $result->result = $story;
            } else{
                $result->messageCode = 0;
                $result->message = 'Get Failed';
            }
        } catch (\Exception $exception){
            $result->messageCode = 0;
            $result->message = $exception->getMessage();
        }
        return $result;
    }
}