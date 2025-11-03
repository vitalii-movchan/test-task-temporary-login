<?php

namespace App\Services\Cache\Repositories;

use App;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\SimpleCache\InvalidArgumentException;

readonly class CacheRepository implements App\Services\Cache\Repositories\Contract\CacheRepository
{
    /**
     * @param App\Services\Cache\Entity\Contract\Cacheable $cache
     * @return bool
     */
    public function exist(App\Services\Cache\Entity\Contract\Cacheable $cache): bool
    {
        return cache()->has($cache->getCacheKey());
    }

    /**
     * @param App\Services\Cache\Entity\Contract\Cacheable $cache
     * @return mixed
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function get(App\Services\Cache\Entity\Contract\Cacheable $cache): mixed
    {
        return cache()->get($cache->getCacheKey());
    }

    /**
     * @param App\Services\Cache\Entity\Contract\Cacheable $cache
     * @return bool
     */
    public function save(App\Services\Cache\Entity\Contract\Cacheable $cache): bool
    {

        return cache()->put(key: $cache->getCacheKey(), value: $cache->getCacheValue(), ttl: $cache->getCacheTTL());
    }

    /**
     * @param App\Services\Cache\Entity\Contract\Cacheable $cache
     * @return bool
     * @throws InvalidArgumentException
     */
    public function delete(App\Services\Cache\Entity\Contract\Cacheable $cache): bool
    {

        return cache()->delete(key: $cache->getCacheKey());
    }
}
