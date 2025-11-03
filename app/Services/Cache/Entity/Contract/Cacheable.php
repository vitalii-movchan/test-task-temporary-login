<?php

namespace App\Services\Cache\Entity\Contract;

interface Cacheable
{
    /**
     * @return int
     */
    public function getCacheTTL(): int;

    /**
     * @return string
     */
    public function getCacheKey(): string;

    /**
     * @return string
     */
    public function getCacheValue(): string;
}
