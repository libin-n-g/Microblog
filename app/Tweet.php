<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
	protected $fillable = [
    	'tweet_id',
      	'post_id',
   	];
    public function post()
    {
    	return $this->belongsTo('App\posts');
    }
        /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
