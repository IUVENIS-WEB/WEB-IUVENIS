<?php

namespace App\Providers;

use App\Contracts\IEscritorRepository;
use App\Repositories\EscritorRepository;
use Illuminate\Support\ServiceProvider;

class EscritorRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IEscritorRepository::class, EscritorRepository::class);
    }
}
