<?php

namespace App\Providers;

use App\Contracts\ISalvoRepository;
use App\Repositories\SalvoRepository;
use Illuminate\Support\ServiceProvider;

class SalvoRepositoryProvider extends ServiceProvider
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
        $this->app->bind(ISalvoRepository::class, SalvoRepository::class);
    }
}
