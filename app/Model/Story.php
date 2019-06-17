<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Story extends Model
{
    protected $table = "story";
    protected $hidden = ['created_at','updated_at'];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'story_category');
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
