<div class="panel panel-info">
     <div class="panel-heading">
         <span>{{ ($post->author->name) }}</span>
         <time class="pull-right">{{ $post->posted_at->format('d F Y, H:i') }}</time>
     </div>
     <div class="panel-body">
         {{ $post->content }}
     </div>
 </div>
