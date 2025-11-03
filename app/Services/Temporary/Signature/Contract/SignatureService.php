<?php

namespace App\Services\Temporary\Signature\Contract;

use App;
use App\Services\Temporary\Signature\Entities\Signature;

interface SignatureService
{
    /**
     * @param App\Services\Temporary\Signature\Entities\Signature $signature
     * @return bool
     */
    public function isValid(App\Services\Temporary\Signature\Entities\Signature $signature): bool;


    /**
     * @param App\Services\Temporary\Signature\Entities\Signature $signature
     * @return bool
     */
    public function save(App\Services\Temporary\Signature\Entities\Signature $signature): bool;

    /**
     * @param Signature $signature
     * @return Signature
     */
    public function refresh(App\Services\Temporary\Signature\Entities\Signature $signature): App\Services\Temporary\Signature\Entities\Signature;

    /**
     * @param App\Services\Temporary\Signature\Entities\Signature $signature
     * @return bool
     */
    public function delete(App\Services\Temporary\Signature\Entities\Signature $signature): bool;

}
