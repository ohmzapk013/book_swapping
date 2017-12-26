<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function children()
    {
        return $this->hasMany('App\Comment', 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Comment', 'id', 'parent_id');
    }
}
