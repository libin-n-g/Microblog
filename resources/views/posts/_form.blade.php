<div class="panel panel-default" style="background-color: #dff2db">
    <div class="panel-heading" style="background-color: #f7882f">Add Post</div>

    <div class="panel-body">
        {!! Form::open(['route' => 'posts.store', 'method' => 'post']) !!}
            <div class="form-group">
                {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Enter your Post here']) !!}
            </div>
            {!! Form::submit("Publish Post", ['class' => 'btn btn-primary pull-right']) !!}
        {!! Form::close() !!}
    </div>
</div>
