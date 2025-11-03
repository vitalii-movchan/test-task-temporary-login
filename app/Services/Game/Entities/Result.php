<?php

namespace App\Services\Game\Entities;

use App;

class Result implements App\Services\Game\Entities\Contract\Result
{
    private int $randomNumber;

    private int $status;

    private int $reward;

    /**
     * @param int $randomNumber
     * @param int $status
     * @param int $reward
     */
    public function __construct(int $randomNumber, int $status, int $reward)
    {
        $this->randomNumber = $randomNumber;
        $this->status = $status;
        $this->reward = $reward;
    }

    /**
     * @return int
     */
    public function getRandomNumber(): int
    {
        return $this->randomNumber;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    public function getReward(): int
    {
        return $this->reward;
    }

    /**
     * @param int $randomNumber
     */
    public function setRandomNumber(int $randomNumber): void
    {
        $this->randomNumber = $randomNumber;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @param int $reward
     */
    public function setReward(int $reward): void
    {
        $this->reward = $reward;
    }
}
