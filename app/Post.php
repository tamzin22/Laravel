<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	//create many:one relationship

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
}
