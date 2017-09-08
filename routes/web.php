<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use Illuminate\Http\Request;
use App\Contracts\BillingInterface;


$router->get('/', function () use ($router) {
    return 'I am fine...';
});

$router->post('/users/{userId}/billings', function (Request $request, $userId) {
    if (filter_var($userId, FILTER_VALIDATE_INT)) {
        $this->validate($request, [
            'title'    => 'required|max:255',
            'amount'   => 'required|numeric|max:1000|regex:/^\d+(\.\d{2})*$/',
            'currency' => 'required|in:USD,EUR,PLN',
            'payed_at' => 'required|date_format:Y-m-d H:i:s'
        ]);

        $billing = app(BillingInterface::class);
        $billing->addHistoryToUser($userId, (new \App\Billing($request->all())));
        return ['status' => 1];
    }
});

$router->get('/users/{userId}/billings', function ($userId) {
    if (filter_var($userId, FILTER_VALIDATE_INT)) {
        $billing = app(BillingInterface::class);
        return $billing->getHistoryForUser($userId);
    }
});

$router->post('/users/{userId}/backdoor', 'BackdoorController@store');