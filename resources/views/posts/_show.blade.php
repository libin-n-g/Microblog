<div class="panel panel-info">
     <div class="panel-heading">
         <span><a href="/users/{{$post->author->name}}">{{ ($post->author->name) }}</a></span>
         <time class="pull-right">{{ $post->posted_at->format('d F Y, H:i') }}</time>
     </div>
     <div class="panel-body">
     	<div>{{ $post->content }}</div>
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
