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

    /**
     * Search using the search field on the title of the post
     * @param $query the query builder
     * @param $search the string to search on the title
     * @return the query builder
     */
    public function scopeSearchTitle($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%');
    }
}
