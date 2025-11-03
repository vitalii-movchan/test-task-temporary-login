<?php

namespace App\Services\Cache;

use App;

readonly class CacheService implements App\Services\Cache\Contract\CacheService
{
    public function __construct(
        private App\Services\Cache\Repositories\Contract\CacheRepository $cacheRepository
    )
    {
    }

    /**
     * @param App\Services\Cache\Entity\Contract\Cacheable $cache
     * @return bool
     */
    public function exists(App\Services\Cache\Entity\Contract\Cacheable $cache): bool
    {
        return $this->cacheRepository->exist($cache);
    }

    /**
     * @param App\Services\Cache\Entity\Contract\Cacheable $cache
     * @return mixed
     */
    public function get(App\Services\Cache\Entity\Contract\Cacheable $cache): mixed
    {
        return $this->cacheRepository->get($cache);
    }

    /**
     * @param App\Services\Cache\Entity\Contract\Cacheable $cache
     * @return bool
     */
    public function save(App\Services\Cache\Entity\Contract\Cacheable $cache): bool
    {
        return $this->cacheRepository->save($cache);
    }

    /**
     * @param App\Services\Cache\Entity\Contract\Cacheable $cache
     * @return bool
     */
    public function delete(App\Services\Cache\Entity\Contract\Cacheable $cache): bool
    {
        return $this->cacheRepository->delete($cache);
    }
}
