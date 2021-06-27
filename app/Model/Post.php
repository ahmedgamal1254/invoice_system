<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['id','name','user_id'];

    public function comments(){
        return $this->hasMany('App\Model\Comment');
    }
}
