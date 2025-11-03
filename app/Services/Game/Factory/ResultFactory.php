<?php

namespace App\Services\Game\Factory;

use App;

class ResultFactory implements App\Services\Game\Factory\Contract\ResultFactory
{
    /**
     * @return App\Services\Game\Entities\Contract\Result
     */
    public function create(): App\Services\Game\Entities\Contract\Result
    {
        return new App\Services\Game\Entities\Result(
            randomNumber: 0,
            status: 0,
            reward: 0
        );
    }
}
