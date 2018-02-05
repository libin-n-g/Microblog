<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\posts;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	Schema::defaultStringLength(191);
      	posts::creating(function ($post) {
      		$post->posted_at = Carbon::now();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
