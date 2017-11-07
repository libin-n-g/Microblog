@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #88d317">Search Results</div>
                <div class="panel-body">					
                     @include ('users/_list')
                </div>
            </div>
        </div>
        <div class="col-8-md-12 col-md-offset-1">
        @include('users/search')
        </div>
    </div>
</div>
@endsection








{{-- <table class="table table-bordered table-hover">
	<tbody>
		
	</tbody>
</table>
<script type="text/javascript">
	$('#search').on('keyup', function(){
		$value=$(this).val();
		$.ajax(	{
			type : 'get',
			url  : "{{URL::to('search')}}",
			data : {'search':$value},
			success : function(data){
				$('tbody').html(data);
			}
		});
	})
</script> --}}