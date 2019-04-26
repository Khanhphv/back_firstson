<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Story extends Model
{
    protected $table = "stories";
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function author()
    {
        return $this->belongsTo('App\Author');
    }
}
