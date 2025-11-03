<?php

namespace App\Services\User\Repositories\Contract;

interface UserRepository
{
    /**
     * @param int $userId
     * @return bool
     */
    public function exists(int $userId): bool;
}
