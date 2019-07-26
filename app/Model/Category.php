<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Story;
class Category extends Model
{
    protected $table = "category";
    protected $hidden = ['created_at','updated_at', 'pivot'];
    public function stories() {
        return $this->belongsToMany(Story::class, 'story_category');
    }
}
