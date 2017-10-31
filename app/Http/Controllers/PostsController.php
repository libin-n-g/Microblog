<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\posts;

class PostsController extends Controller
{
    public function index()
    {
        $posts = posts::orderBy('posted_at', 'desc')->paginate(20);
        return view('home')->withposts($posts);
    }
}
