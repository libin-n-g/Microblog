@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
        <div style="padding: 1em">
            @include('users/search')  
        </div>
        <div style="padding: 1em">
            @include('users/usersuggesions')
        </div>
        
        </div>
        <div class="col-md-8 ">
            @include('posts/create')
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #88d317">Dashboard


                </div>
                <div class="panel-body">					
                     @include ('posts/_list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
