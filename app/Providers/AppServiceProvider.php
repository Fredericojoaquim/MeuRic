<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Icategoria;
use App\Repositories\CategoriaRepository;
use App\Repositories\ColecaoRepository;
use App\Interfaces\Icolecao;
use App\Interfaces\Itrabalho;
use App\Repositories\TrabalhoRepository;
use App\Interfaces\IOrientador;
use App\Repositories\OrientadorRepository ;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
   

    public function register()
    {
        $this->app->bind(Icategoria::class, CategoriaRepository::class);
        $this->app->bind(Icolecao::class, ColecaoRepository::class);
        $this->app->bind(Itrabalho::class, TrabalhoRepository::class);
        $this->app->bind(IOrientador::class, OrientadorRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
    }
}
