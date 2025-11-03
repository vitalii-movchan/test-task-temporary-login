<?php

namespace App\Services\Game\Factory\Contract;

use App;

interface ResultFactory
{
    /**
     * @return App\Services\Game\Entities\Contract\Result
     */
    public function create(): App\Services\Game\Entities\Contract\Result;
}
