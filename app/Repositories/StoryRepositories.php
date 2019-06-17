<?php


namespace App\Repositories;

use App\Object\ResultObject ;
use App\Object\StoryObject;
use App\Model\Story;
use http\Exception;
class StoryRepositories
{

    public function getList($limit =0){
        $result = new ResultObject();
        $storyFomat = new StoryObject();
        try {
            if($limit ===0){
                $listStory = Story::with( 'categories','author')->get();
            } else {
                $listStory = Story::with ('categories', 'author')->paginate($limit);
            };
            if ($listStory){
                $result->result = $listStory;
                $result->message = "Get list story";
                $result->messageCode = 1;
            }
        } catch (Exception $exception){
            $result->messageCode = 0;
            $result->message = $exception->getMessage();
        }
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