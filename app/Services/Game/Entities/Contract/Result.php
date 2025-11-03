<?php

namespace App\Services\Game\Entities\Contract;

interface Result
{
    /**
     * @return int
     */
    public function getRandomNumber(): int;

    /**
     * @return int
     */
    public function getStatus(): int;

    public function getReward(): int;

    /**
     * @param int $randomNumber
     */
    public function setRandomNumber(int $randomNumber): void;

    public function setStatus(int $status): void;

    /**
     * @param int $reward
     */
    public function setReward(int $reward): void;
}
