<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\CacheServiceProvider::class,
    App\Providers\GameServiceProvider::class,
    App\Providers\UserServiceProvider::class,
    App\Providers\TemporarySignatureProvider::class,

    //
    Abram\Odbc\ODBCServiceProvider::class
];
