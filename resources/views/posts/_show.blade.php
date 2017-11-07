<div class="panel panel-info">
     <div class="panel-heading">
         <span><a href="/users/{{$post->owner->name}}">{{ ($post->owner->name) }} 
         @if($post->owner->id!=$post->author->id) 
         	{{"retweeted by "}}{{$post->author->name}} 
         @endif</a></span>
         <time class="pull-right">{{ $post->posted_at->format('d F Y, H:i') }}</time>
     </div>
     <div class="panel-body">
     	<div>{{ $post->content }}</div>
     	<div class="row" style="padding: 1em">
     	<div>
        @if ((Auth::user()->id!=$post->author->id)  && (Auth::user()->id!=$post->owner->id))

        {!! Form::open(['route' => 'retweet', 'method' => 'post']) !!}
        {!! Form::hidden('post', $post) !!}
        {!! Form::submit("Retweet", ['class' => 'btn btn-primary pull-left' ]) !!}
        {!! Form::close() !!}
        @endif
 		</div>
 		<div>
     	@if (Auth::user()->isLiked($post))

        {!! Form::open(['route' => 'unlike', 'method' => 'post']) !!}
        {!! Form::hidden('post', $post) !!}
        {!! Form::submit("Unlike", ['class' => 'btn btn-primary pull-right']) !!}
        {!! Form::close() !!}
     							
     	@else

        {!! Form::open(['route' => 'like', 'method' => 'post']) !!}
        {!! Form::hidden('post', $post) !!}
        {!! Form::submit("Like", ['class' => 'btn btn-primary pull-right']) !!}
        {!! Form::close() !!}
     							
     	@endif
     	</div>
     	</div>
        
     </div>
 </div>
