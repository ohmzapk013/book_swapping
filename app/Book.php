<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
