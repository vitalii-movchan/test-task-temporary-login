<?php

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;

class GameServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(App\Services\Game\Factory\Contract\ResultFactory::class,
            fn() => new App\Services\Game\Factory\ResultFactory()
        );

        $this->app->bind(App\Services\Game\Strategies\Contract\RewardStrategy::class,
            fn() => new App\Services\Game\Strategies\RewardStrategy()
        );

        $this->app->bind(App\Services\Game\Contract\GameService::class,
            fn($app) => new App\Services\Game\GameService(
                $app->make(App\Services\Game\Factory\Contract\ResultFactory::class),
                $app->make(App\Services\Game\Strategies\Contract\RewardStrategy::class),
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
