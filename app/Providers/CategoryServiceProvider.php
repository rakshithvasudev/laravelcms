<?php

namespace App\Providers;

use App\Category;
use App\Tag;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('layouts.blog-post', function($view){

            $view->with('categories',Category::all())->with('tags',Tag::all());

        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
