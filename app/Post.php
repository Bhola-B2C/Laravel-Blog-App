<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function Admin()
    {
    	return $this->belongsTo('App\Admin');	
    }
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }
}
