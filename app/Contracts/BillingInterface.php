<?php
/**
 * Created by PhpStorm.
 * User: kuba
 * Date: 07.09.17
 * Time: 11:02
 */

namespace App\Contracts;

use App\Billing;

interface BillingInterface
{
    public function getHistoryForUser($userId):array;
    public function addHistoryToUser($userId, Billing $billing):void;
}