<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $fillable = [
    	'author_id',
      	'title',
      	'content',
      	'posted_at'
   	];
   	public $dates = [ 'posted_at' ];
   	public function author()
    {
      return $this->belongsTo('App\User', 'author_id');
    }
}
