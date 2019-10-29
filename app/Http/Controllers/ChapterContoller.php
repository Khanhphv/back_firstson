<?php


namespace App\Http\Controllers;


use App\Model\Chapter;
use App\Model\Story;
use Illuminate\Http\Request;

class ChapterContoller extends Controller
{
    public function addChapter (Request $rq){
        if(!Story::where('id', $rq->titlle )->exists()){
            $new_chapter = new Chapter();
            $new_chapter->content = $rq->chapter_content;
            $new_chapter->title = $rq->title;
            $new_chapter->story_id = $author = Story::findOrFail($rq->story_id);
            return response($new_chapter,200);
        }
    }
}
