<?php

namespace App\Services\Temporary\Signature\Entities;

class Signature
{
    /**
     * @var int
     */
    private int $userId;

    /**
     * @var string
     */
    private string $hash;

    /**
     * @param int $userId
     * @param string $hash
     */
    public function __construct(int $userId, string $hash)
    {
        $this->userId = $userId;
        $this->hash = $hash;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param int $userId
     * @return void
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }
}
