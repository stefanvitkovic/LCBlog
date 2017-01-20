<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = 'true';

    protected $fillable = [
       'name','body','user_id','article_id',
    ];
}
