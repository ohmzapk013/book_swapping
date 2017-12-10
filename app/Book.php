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
    	return $this->belongsTo('App\Author');
    }
}
