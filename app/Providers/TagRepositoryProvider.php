<?php

namespace App\Providers;

use App\Contracts\ITagRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\ServiceProvider;

class TagRepositoryProvider extends ServiceProvider
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
        $this->app->bind(ITagRepository::class, TagRepository::class);
    }
}
