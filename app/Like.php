<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $fillable = [
    	'user_id',
      	'post_id',
   	];
    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
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
