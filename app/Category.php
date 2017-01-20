<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = 'true';

    protected $fillable = [
        'title',
    ];

    public function article(){
    	return $this->hasMany('App\Article');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
