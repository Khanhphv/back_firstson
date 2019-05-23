<?php


namespace App\Repositories;

use App\Category;
use App\Model\StoryCategory;
use App\Object\ResultObject ;
use App\Object\StoryObject;
use App\Story;
use http\Exception;
use Illuminate\Support\Facades\DB;
class StoryRepositories
{

    public function getList($limit =0 , $param){
        $result = new ResultObject();
        $listStory = Story::with( 'categories','authors');
        try {
            if(!$param->category && !$param->author) {
                if($limit === 0){
                    $listStory = $listStory->get();
                } else {
                    $listStory = $listStory->paginate(10);

                };
            } else {
                if($param->category) {
                    $listStory = Category::with('stories')->where('id', '=' , $param->category)->get();
                    $listStory = $listStory[0]->stories;
                }
            }

            if ($listStory){
                $result->result = $listStory;
                $result->message = "Get list story";
                $result->messageCode = 1;
            }
        } catch (Exception $exception){}
        return $result;
    }

    public function getIndex($id = 0){
        $result = new ResultObject();
        try {
            $story = Story::with('categories','authors')->findOrFail($id);
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