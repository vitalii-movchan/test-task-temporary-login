<?php

namespace App\Services\User;

use App;

readonly class UserService implements App\Services\User\Contract\UserService
{
    /**
     * @param Repositories\Contract\UserRepository $userRepository
     */
    public function __construct(
        private App\Services\User\Repositories\Contract\UserRepository $userRepository
    )
    {
    }

    /**
     * @param int $userId
     * @return bool
     */
    public function exists(int $userId): bool
    {
        return $this->userRepository->exists($userId);
    }
}
