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
        //$posts = $request->user()->postSuggesions();
        //dd($posts->all());
        //$posts = posts::find($posts->all());
        //dd($posts->pluck('id')->all()) ;
        //$posts = (posts::whereIn('id', $posts->pluck('id')->all())->orderBy('posted_at', 'desc')->paginate(20));
        $allposts = posts::whereIn(
          'author_id',
          $request->user()->following()->pluck('users.id')->push($request->user()->id)
        );
        //dd($allposts);
        //dd($allposts);
        $posts = $allposts->orderBy('posted_at', 'desc')->paginate(20);
        $users = $request->user()->suggesions()->take(10);
        return view('home', compact('users', 'posts'));
    }
    // public function retweet(Request $request)
    // {
    //   //dd($post);
    //   $user = Auth::user();
    //   $tee = new Tweet();
    //   $post = json_decode($request->input('post'));
    //   //dd($tee);
    //     // $like = $user->likes()->attach($user->id, ['post_id' => $post->id]);
    //     $count = $post->likecount + 1;
    //     posts::where('id', $post->id)->update(['tweetcount' => $count]);
    //     $tee = $tee->create([
    //       'tweet_id' => $user->id,
    //       'post_id' => $post->id
    //   ]);
    //     //dd($liked);
    //     return redirect()->back();
    // }
    // public function unretweet(Request $request)
    // {

    //   $user = Auth::user();
    //   $post = json_decode($request->input('post'));
    //   $count = $post->likecount - 1;
    //   posts::where('id', $post->id)->update(['tweetcount' => $count]);
    //     $report = Tweet::where('tweet_id', '=', $user->id)
    //             ->where('post_id', '=', $post->id)
    //             ->delete();
    //     return redirect()->back();
    // }
    // public function retweet(Request $request)
    // {
    //     $user = Auth::user();
    //     $posta = json_decode($request->input('post'));
    //     //dd($posta->content);
    //     //dd($posta->author);
    //     $post = $user->posts()->create([
    //       'content' => ($posta->content) . "
    //        retweeted post from " . $posta->author->name
    //     ]);
  
    //   return redirect()->back()->with('success', "Retweeting is Successful");

    // }
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

    public function retweet(Request $request)
    {
      $user = Auth::user();
      $post = json_decode($request->input('post'));
      $post = $user->posts()->create([
          'owner_id'=> $post->owner_id,
          'content' => $post->content,
          'posted_at' => $post->posted_at
      ]);
      return redirect()->back()->with('success', "Posting is Successful");
    }

}
