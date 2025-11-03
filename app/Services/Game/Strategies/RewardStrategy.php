<?php

namespace App\Services\Game\Strategies;

use App;

class RewardStrategy implements App\Services\Game\Strategies\Contract\RewardStrategy
{
    /**
     * @param int $randomNumber
     * @return float
     */
    public function calculate(int $randomNumber): float
    {
        return match (true) {
            $randomNumber > 900 => $randomNumber * 0.7,
            $randomNumber > 600 => $randomNumber * 0.5,
            $randomNumber > 300 => $randomNumber * 0.3,
            default => $randomNumber * 0.1,
        };
    }
}
