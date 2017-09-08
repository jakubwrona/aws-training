<?php

namespace App\Jobs;

use App\Contracts\BillingInterface;
use Log;
use Illuminate\Contracts\Queue\Job as SomeJob;

class BillingJob extends Job
{

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SomeJob $job, array $data)
    {
        $billing = app(BillingInterface::class);
        $billing->addHistoryToUser($data['user_id'], (new \App\Billing($data)));
        Log::info(new \App\Billing($data) . ' added susccessully');
    }
}
