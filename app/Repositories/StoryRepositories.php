<?php


namespace App\Repositories;

use App\Category;
use App\Model\StoryCategory;
use App\Object\ResultObject;
use App\Object\StoryObject;
use App\Model\Story;
use http\Env\Request;
use http\Exception;
use Illuminate\Support\Facades\DB;
class StoryRepositories
{
    /**
     * bien chua cac phan tu can loc ( array containts  filter attribute)
     */
    var $listFilter = array("category", "author", "year");
    var $limit = 0;
    public function getListStory($limit = 0, $param)
    {
        $this->limit = $limit;
        if (sizeof($this->checkFilter($param)) > 0) {
            return $this->getStoryByFilter($param);
        } else {
            return $this->getAllListStory();
        }
    }

    public function getIndex($id = 0)
    {
        $result = new ResultObject();
        try {
            $story = Story::with('categories', 'authors')->findOrFail($id);
            if ($story) {
                $result->messageCode = 1;
                $result->message = "Get success";
                $result->result = $story;
            } else {
                $result->messageCode = 0;
                $result->message = 'Get Failed';
            }
        } catch (Exception $exception) {
            $result->messageCode = 0;
            $result->message = $exception->getMessage();
        }
        return $result;
    }

    /**
     *
     * return list data follow filter
     */
    private function getStoryByFilter($param){
        $result = new ResultObject();
        $listStory = Story::with('categories', 'authors')->whereHas('categories', function ($query){
            $query->where('category.id','=',2);
        })->get();
        return $listStory;
    }

    /**
     * @param $limit
     * @return ResultObject (list story )
     */
    private function getAllListStory()
    {
        $result = new ResultObject();
        $listStory = Story::with('categories', 'authors');
        try {
            if ($this->limit === 0) {
                $listStory = Story::with('categories', 'authors')->get();
            } else {
                $listStory = Story::with('categories', 'authors')->paginate($this->limit);
            };
            if ($listStory) {
                $result->result = $listStory;
                $result->message = "Get list story";
                $result->messageCode = 1;
            }
        } catch (Exception $exception) {
            $result->messageCode = 0;
            $result->message = $exception->getMessage();
        }
        return $result;

    }

    /**
     * @param $request
     * @return tra ve mang chua cac phan tu can loc ( return a array containts filter attribute)
     */
    private function checkFilter($param)
    {
        $arrayFilter = array();
        foreach ($this->listFilter as $key => $value) {
            # code...
            if (isset($param[$value])) {
                array_push($arrayFilter, $param[$value]);
            }
        }
        return $arrayFilter;
    }
}
