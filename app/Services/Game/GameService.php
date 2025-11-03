<?php

namespace App\Services\Game;

use App;
use Random\RandomException;

readonly class GameService implements App\Services\Game\Contract\GameService
{
    public function __construct(
        private App\Services\Game\Factory\Contract\ResultFactory $resultFactory,
        private App\Services\Game\Strategies\Contract\RewardStrategy $rewardStrategy,
    )
    {
    }

    /**
     * @throws RandomException
     */
    public function play(): App\Services\Game\Entities\Contract\Result
    {
        $result = $this->resultFactory->create();

        $result->setRandomNumber(random_int(0, 1000));

        if ($result->getRandomNumber() % 2 !== 0) {
            $result->setStatus(App\Services\Game\Enums\Status::Loose->value);
            $result->setReward(0);

            return $result;
        }

        $result->setStatus(App\Services\Game\Enums\Status::Win->value);
        $result->setReward($this->rewardStrategy->calculate($result->getRandomNumber()));

        return $result;
    }
}
