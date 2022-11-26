<?php

namespace App\Providers;

use App\Contracts\IOrganizacaoRepository;
use App\Repositories\OrganizacaoRepository;
use Illuminate\Support\ServiceProvider;

class OrganizacaoRepositoryProvider extends ServiceProvider
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
        $this->app->bind(IOrganizacaoRepository::class, OrganizacaoRepository::class);
    }
}
