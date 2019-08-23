<?php


namespace App\Repositories;
use App\Object\ResultObject;
use App\Model\Story;
use Exception;
use Illuminate\Support\Facades\Config;
class StoryRepositories
{
    var $limit = 0;

    public function getListStory($limit, $param)
    {
        $this->limit = $limit;
        return $this->getStoryByFilter($param);
    }

    public function getIndex($id = 0)
    {
        $result = new ResultObject();
        try {
            $story = Story::with('categories', 'authors')->findOrFail($id);
            if ($story) {
                $result->messageCode = 1;
                $result->message = "Get story success";
                $result->result = $story;
            } else {
                $result->messageCode = 0;
                $result->message = "Get story failed";
                $result->result = $story;
            }
        } catch (Exception $exception) {
            $result->messageCode = 0;
            $result->message = $exception->getMessage();
        }
        return $result;
    }

    /**
     * param category, author, sort
     * return list data follow filter
     */
    private function getStoryByFilter($param)
    {
        $result = new ResultObject();
        try {
            $listStory = Story::with('categories', 'authors')
                ->whereHas('categories', function ($query) use ($param) {
                    if (!isset($param->category)) {
                        return;
                    };
                    $query->where('category.id', '=', $param->category);
                })
                ->whereHas('authors', function ($query) use ($param) {
                    if (!isset($param->author)) {
                        return;
                    };
                    $query->where('author.id', '=', $param->author);
                });
            if (isset($param->year)) {
                $listStory = $listStory->where("likes", '=', $param->year);
            }
            if(isset($param->sort)){
                // sap xep nhu the nao
                $listStory = $this->sortBy($listStory,$param->sort);
            }
            $listStory = $listStory->orderBy('name', 'DESC')->paginate($this->limit);
            if ($listStory) {
                $result->messageCode = 1;
                $result->message = "Get list story";
                $result->result = $listStory;
            }
        } catch (Exception $exception) {
            $result->messageCode = 0;
            $result->message = $exception->getMessage();
        }
        return $result;
    }

    private function sortBy ($data, $index){
        switch ($index){
            case Config::get('Common.sort.likesASC') :
                $data = $data->orderBy('likes', 'asc');
                break;
            case Config::get('Common.sort.likesDESC') :
                $data = $data->orderBy('likes', 'desc');
                break;
            case Config::get('Common.sort.viewsASC') :
                $data = $data->orderBy('views', 'asc');
                break;
            case Config::get('Common.sort.viewsDESC') :
                $data = $data->orderBy('views', 'desc');
                break;
            default :
                break;
        }
        return $data;

    }
}
