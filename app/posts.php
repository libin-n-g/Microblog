<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $fillable = [
    	'author_id',
      	'content',
      	'posted_at'
   	];
   	public $dates = [ 'posted_at' ];
   	public function author()
    {
      return $this->belongsTo('App\User', 'author_id');
    }
    public function likes()
    {
        return $this->belongsToMany('App\posts', 'likes', 'post_id');
    }
}
