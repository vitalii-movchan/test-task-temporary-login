<?php

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;

class CacheServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(App\Services\Cache\Repositories\Contract\CacheRepository::class,
            fn() => new App\Services\Cache\Repositories\CacheRepository()
        );

        $this->app->bind(App\Services\Cache\Contract\CacheService::class,
            fn ($app) => new App\Services\Cache\CacheService(
                $app->make(App\Services\Cache\Repositories\Contract\CacheRepository::class)
            )
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
