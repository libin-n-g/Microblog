{!! Form::open(['url' => '/search', 'method' => 'post'])  !!}
 
<div class="input-group custom-search-form" >
    <div class="input-group custom-search-form">
    	{!! Form::text('name', null, ['class' => 'form-control', 'rows' => 1, 'cols' => 40, 'placeholder' => 'Search users']) !!}
        {{-- <input type="text" class="form-control" name="search" placeholder="Search..."> --}}
            <span class="input-group-btn">
    			<button class="btn btn-default-sm" type="submit">
        			&#128269;
    			</button>
			</span>
	</div>
</div>
{!! Form::close() !!}	
