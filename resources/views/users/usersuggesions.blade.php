
<div class="panel panel-default" style="background-color: #dff2db">
	<div class="panel-heading text-center" style="background-color: #88d317">Suggestion</div>
	<div class="panel-body">					
		@foreach ($users as $user)
			<div class="text-center">
				<a href="/users/{{ ($user->name) }}">{{ ($user->name) }}</a>
			</div>	
		@endforeach
	</div>
</div>
