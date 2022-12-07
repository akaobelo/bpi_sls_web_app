<?php

namespace App\Providers;

use App\Interfaces\StoreInterface;

use App\Repositories\StoreRepository;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
     /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StoreInterface::class, StoreRepository::class);
    }
}
