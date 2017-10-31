<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('shared/navbar')
                <div class="container">
                	@if (Session::has('success'))
                	<div class="alert alert-sucess alert-dismissible" role="alert">
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                	{{ Session::get('success')}}
                    </div>	
				@endif
				@if (Session::has('errors'))
				    <div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				{{ trans_choice('validation.errors', $errors->count()) }}
			 	    <ul>
				@foreach($errors->all() as $error)
				    <li>{{ $error }}</li>
				@endforeach
                    </ul>
                    </div>
                @endif
                </div>
        </nav>
		
        @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
