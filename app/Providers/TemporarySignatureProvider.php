<?php

namespace App\Providers;

use App;
use App\Models\User;
use App\Services\Temporary\Signature\Entities\Signature;
use Illuminate\Auth\RequestGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class TemporarySignatureProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(App\Services\Temporary\Signature\Contract\SignatureService::class,
            fn($app) => new App\Services\Temporary\Signature\SignatureService(
                $app->make(App\Services\User\Contract\UserService::class),
                $app->make(App\Services\Cache\Contract\CacheService::class)
            )
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(App\Services\Temporary\Signature\Contract\SignatureService $signatureService): void
    {
        Auth::viaRequest('temporary-signature', function (Request $request) use ($signatureService) {
            $signature = new Signature($request->route('user'), $request->route('hash'));

            if ($signatureService->isValid($signature)) {
                return User::query()->find($request->route('user'))->first();
            }

            return null;
        });

        RequestGuard::macro('signature', function () {
            return new Signature(request()->route('user'), request()->route('hash'));
        });
    }
}
