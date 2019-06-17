<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "author";
    protected $hidden = ['created_at','updated_at'];
    public function story(){
        return $this->hasMany('App\Model\Story');
    }
}
