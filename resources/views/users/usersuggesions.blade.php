<div class="panel panel-default">
	<div class="panel-heading text-center">Suggessions</div>
	<div class="panel-body">					
		@foreach ($users as $user)
			<div class="text-center">
				<a href="/users/{{ ($user->name) }}">{{ ($user->name) }}</a>
			</div>	
		@endforeach
	</div>
</div>
