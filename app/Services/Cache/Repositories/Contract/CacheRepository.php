<?php

namespace App\Services\Cache\Repositories\Contract;

use App;

interface CacheRepository
{
    /**
     * @param App\Services\Cache\Entity\Contract\Cacheable $cache
     * @return bool
     */
    public function exist(App\Services\Cache\Entity\Contract\Cacheable $cache): bool;

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

    /**
     * @param App\Services\Cache\Entity\Contract\Cacheable $cache
     * @return bool
     */
    public function delete(App\Services\Cache\Entity\Contract\Cacheable $cache): bool;
}
