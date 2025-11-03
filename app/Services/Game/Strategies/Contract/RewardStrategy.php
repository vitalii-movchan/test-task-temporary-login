<?php

namespace App\Services\Game\Strategies\Contract;

interface RewardStrategy
{
    /**
     * @param int $randomNumber
     * @return float
     */
    public function calculate(int $randomNumber): float;
}
