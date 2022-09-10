<?php

namespace App\Providers;

use App\Contracts\IUserRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;


class UserRepositoryProvider extends ServiceProvider
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
        $this->app->bind(IUserRepository::class, UserRepository::class);
    }
}
