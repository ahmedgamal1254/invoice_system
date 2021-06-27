<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['id','comment','post_id'];

    public function post(){
        return $this->belongsTo('App\Model\Post');
    }
}
