<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Story extends Model
{
    protected $table = "stories";
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'story_category');
    }

    public function authors()
    {
        return $this->belongsTo('App\Author', 'author_id');
    }
}
