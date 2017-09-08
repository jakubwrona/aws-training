<?php
/**
 * Created by PhpStorm.
 * User: kuba
 * Date: 08.09.17
 * Time: 00:29
 */

return [
    'handlers' => [
        'base-integrations-updates' => App\Jobs\BillingJob::class,
    ],

    'default-handler' => App\Jobs\BillingJob::class
];