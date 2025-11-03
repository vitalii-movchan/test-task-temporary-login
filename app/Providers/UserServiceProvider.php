<?php

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(App\Services\User\Repositories\Contract\UserRepository::class,
            fn() => new App\Services\User\Repositories\UserRepository()
        );

        $this->app->bind(App\Services\User\Contract\UserService::class,
            fn ($app) => new App\Services\User\UserService(
                $app->make(App\Services\User\Repositories\Contract\UserRepository::class)
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
