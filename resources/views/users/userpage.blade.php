@extends('layouts.app')
 
 @section('content')
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
     			<div class="panel-heading">
         			<span><a href="/users/{{$user->name}}">{{ ($user->name) }}</a></span>
     			</div>  
     			<div class="panel-body">
     				@if (Auth::guest() || Auth::user()->isNot($user))
     					@if (Auth::guest())
     					    <div><a href="\">Follow</a></div>
     					@else
     						@if (Auth::user()->isFollowing($user))
     							<div><a href="{{route('user.unfollow', $user)}}">UnFollow</a></div>	
     						@else
     							<div><a href="{{route('user.follow', $user)}}">Follow</a></div>
     						@endif
     					@endif 
     				@endif
        			<b>Email : </b>  {{ $user->email }}	
     			</div>
 			</div>
       </div>
   </div>
 @endsection
