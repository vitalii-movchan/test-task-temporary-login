<?php

namespace App\Services\User\Repositories;

use App;

readonly class UserRepository implements App\Services\User\Repositories\Contract\UserRepository
{
    /**
     * @param int $userId
     * @return bool
     */
    public function exists(int $userId): bool
    {
        return App\Models\User::query()->find($userId)->first()->exists;
    }
}
