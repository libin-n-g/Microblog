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
    public function show(Request $request, posts $post)
    {
      return view('posts.show')->withPost($post);
    }
    public function create(Request $request)
    {
      return view('posts.create');
    }
    public function store(PostRequest $request)
    {
      $user = Auth::user();
  
      $post = $user->posts()->create([
          'content' => $request->input('content')
      ]);
  
      return redirect()->route('posts.show', $post)->with('success', "Posting is Sucessfull");
    }
}
