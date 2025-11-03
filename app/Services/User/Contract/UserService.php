<?php

namespace App\Services\User\Contract;

use App;

interface UserService
{
    /**
     * @param int $userId
     * @return bool
     */
    public function exists(int $userId): bool;
}
