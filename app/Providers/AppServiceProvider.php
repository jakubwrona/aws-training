<?php

namespace App\Providers;

use App\Contracts\BillingInterface;
use App\Repository\BillingDisk;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        switch(env('APP_STORAGE', 'Disk')) {
            case 'Disk':
                $this->app->singleton(BillingInterface::class, BillingDisk::class);
                break;
            default:
                break;
        }
    }
}