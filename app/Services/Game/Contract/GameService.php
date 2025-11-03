<?php

namespace App\Services\Game\Contract;

use App;
use Random\RandomException;

interface GameService
{
    /**
     * @throws RandomException
     */
    public function play(): App\Services\Game\Entities\Contract\Result;
}
