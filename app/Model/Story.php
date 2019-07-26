<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Author;
class Story extends Model
{
    protected $table = "story";
    protected $hidden = ['created_at','updated_at', 'pivot'];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'story_category');
    }

    public function authors()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
