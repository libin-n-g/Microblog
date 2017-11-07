<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\posts;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function index()
    {
        $posts = posts::orderBy('posted_at', 'desc')->paginate(20);
        return view('home')->withposts($posts);
    }
    public function indexper(Request $request)
    {
        $allposts = posts::whereIn(
          'author_id',
          $request->user()->following()->pluck('users.id')->push($request->user()->id)
        );
        $posts = $allposts->orderBy('posted_at', 'desc')->paginate(20);
        $users = $request->user()->suggesions()->take(10);
        return view('home', compact('users', 'posts'));
    }
    public function show(Request $request, posts $post)
    {
      return view('posts.show')->withPost($post);
    }
    // public function create(Request $request)
    // {
    //   return view('posts.create');
    // }
    public function store(PostRequest $request)
    {
      $user = Auth::user();
  
      $post = $user->posts()->create([
          'owner_id'=>$user->id,
          'content' => $request->input('content')
      ]);
  
      return redirect()->back()->with('success', "Posting is Successful");
    }

    public function retweet(PostRequest $request)
    {
      $user = Auth::user();
      $post = json_decode($request->input('post'));
      $retw = new posts;
      $retw -> author_id=$user->id;
      $retw -> owner_id=$post->owner_id;
      $retw -> content=$post->content;
      $retw -> posted_at=$post->posted_at;
      $retw -> save();
      return redirect()->back()->with('success', "Posting is Successful");
    }

}
