<?php
/**
 * Created by PhpStorm.
 * User: kuba
 * Date: 07.09.17
 * Time: 11:17
 */

namespace App\Repository;
use App\Billing;
use App\Contracts\BillingInterface;

class BillingDisk implements BillingInterface
{
    public function getHistoryForUser($userId):array
    {
        if (file_exists(storage_path($userId.'.data'))) {
            $items = array_map(function($item) {
                return new Billing(array_combine(['title', 'amount', 'currency', 'payed_at'], explode('@@@', trim($item))));
            }, file(storage_path($userId.'.data')));
            return array_reverse($items);
        }
        return [];
    }

    public function addHistoryToUser($userId, Billing $billing):void
    {
        $f = fopen(storage_path($userId.'.data'), 'a');
        fputs($f, $billing . "\n");
        fclose($f);
    }
}