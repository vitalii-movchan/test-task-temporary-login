<?php

namespace App\Services\Cache\Contract;

use App;

interface CacheService
{
    /**
     * @param App\Services\Cache\Entity\Contract\Cacheable $cache
     * @return bool
     */
    public function exists(App\Services\Cache\Entity\Contract\Cacheable $cache): bool;

    /**
     * @param App\Services\Cache\Entity\Contract\Cacheable $cache
     * @return mixed
     */
    public function get(App\Services\Cache\Entity\Contract\Cacheable $cache): mixed;

    /**
     * @param App\Services\Cache\Entity\Contract\Cacheable $cache
     * @return bool
     */
    public function save(App\Services\Cache\Entity\Contract\Cacheable $cache): bool;
}
