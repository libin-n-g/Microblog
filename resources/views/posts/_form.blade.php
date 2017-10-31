<div class="panel panel-default">
    <div class="panel-heading">Add Blog</div>
    <div class="panel-body">
        {!! Form::open(['route' => 'posts.store', 'method' => 'post']) !!}
            <div class="form-group">
                {!! Form::label('content','Enter your Mini blog below') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Enter your Blog here']) !!}
            </div>
            {!! Form::submit("Publish Blog", ['class' => 'btn btn-primary pull-right']) !!}
        {!! Form::close() !!}
    </div>
</div>
