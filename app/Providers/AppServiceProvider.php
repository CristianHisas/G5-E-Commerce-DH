<?php

namespace App\Providers;

use App\Categoria;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Categoria;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        view()->share('categoriaGlobal', Categoria::all());
    }
}
