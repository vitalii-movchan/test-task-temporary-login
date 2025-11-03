<?php

namespace App\Services\Temporary\Signature;

use App;
use Random\RandomException;

readonly class SignatureService implements App\Services\Temporary\Signature\Contract\SignatureService
{
    public function __construct(
        private App\Services\User\UserService            $userService,
        private App\Services\Cache\Contract\CacheService $cacheService,
    )
    {
    }

    /**
     * @param Entities\Signature $signature
     * @return bool
     */
    public function save(App\Services\Temporary\Signature\Entities\Signature $signature): bool
    {
        return $this->cacheService->save(new App\Services\Temporary\Signature\Cache\Signature($signature));
    }

    /**
     * @param Entities\Signature $signature
     * @return bool
     * @throws RandomException
     */
    public function refresh(App\Services\Temporary\Signature\Entities\Signature $signature): App\Services\Temporary\Signature\Entities\Signature
    {

        $this->cacheService->delete(new App\Services\Temporary\Signature\Cache\Signature($signature));
        $this->cacheService->save(new App\Services\Temporary\Signature\Cache\Signature($signature));

        $signature->setHash($this->cacheService->get(new App\Services\Temporary\Signature\Cache\Signature($signature)));

        return $signature;
    }

    /**
     * @param Entities\Signature $signature
     * @return bool
     */
    public function delete(App\Services\Temporary\Signature\Entities\Signature $signature): bool
    {
        return $this->cacheService->delete(new App\Services\Temporary\Signature\Cache\Signature($signature));
    }

    /**
     * @param App\Services\Temporary\Signature\Entities\Signature $signature
     * @return bool
     */
    public function isValid(App\Services\Temporary\Signature\Entities\Signature $signature): bool
    {
        if ($this->userService->exists($signature->getUserId()) === false) {
            return false;
        }

        $cacheSignature = new App\Services\Temporary\Signature\Cache\Signature($signature);

        if ($this->cacheService->exists($cacheSignature) === false) {
            return false;
        }

        if ($this->cacheService->get($cacheSignature) !== $signature->getHash()) {
            return false;
        }

        return true;
    }
}
