<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Like;
use App\posts;
class LikeController extends Controller
{
    public function likePost(Request $request, posts $post)
    {
    	//dd($post);
    	$user = Auth::user();
  		$like = new Like();
  		$post = json_decode($request->input('post'));
  		//dd($post);
      	// $like = $user->likes()->attach($user->id, ['post_id' => $post->id]);
      	$liked = $like->create([
          'user_id' => $user->id,
          'post_id' => $post->id
      ]);
      	//dd($liked);
      	return redirect()->back();
    }
    public function unLikePost(Request $request)
    {
    	$user = Auth::user();
  		$post = json_decode($request->input('post'));
      	$report = Like::where('user_id', '=', $user->id)
                ->where('post_id', '=', $post->id)
                ->delete();
      	return redirect()->back();
    }
}
