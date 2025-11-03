<?php

namespace App\Services\Temporary\Signature\Cache;

use App\Services\Cache;

readonly class Signature implements Cache\Entity\Contract\Cacheable
{
    /**
     * @param \App\Services\Temporary\Signature\Entities\Signature $signature
     */
    public function __construct(
        private \App\Services\Temporary\Signature\Entities\Signature $signature,
    )
    {
    }

    /**
     * @return int
     */
    public function getCacheTTL(): int
    {
        return 60 * 60 * 24 * 7;
    }

    /**
     * @return string
     */
    public function getCacheKey(): string
    {
        return "user:{$this->signature->getUserId()}:signature.v1";
    }

    /**
     * @return string
     */
    public function getCacheValue(): string
    {
        return $this->signature->getHash();
    }
}
