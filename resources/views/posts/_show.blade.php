<div class="panel panel-info">
     <div class="panel-heading">
         <span><a href="/users/{{$post->author->name}}">{{ ($post->author->name) }}</a></span>
         <time class="pull-right">{{ $post->posted_at->format('d F Y, H:i') }}</time>
     </div>
     <div class="panel-body">
         {{ $post->content }}
     </div>
 </div>
