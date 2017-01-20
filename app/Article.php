<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = 'true';

    protected $fillable = [
        'title', 'body', 'category_id',
    ];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
