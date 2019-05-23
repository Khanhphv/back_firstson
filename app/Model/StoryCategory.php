<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019-05-21
 * Time: 14:34
 */

namespace App\Model;
use App\Story;
use Illuminate\Database\Eloquent\Model;

class StoryCategory extends Model {
    protected $table = "story_category";


    public function stories () {
        return $this->belongsTo(Story::class, 'id');
    }

}
