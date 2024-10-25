<?php

use App\Http\Controllers\ManageSubscriptionController;
use App\Http\Middleware\SubscribedMiddleware;
use App\Http\Middleware\UnSubscribedMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware([SubscribedMiddleware::class])->get('/dashboard', function () {
        $user = auth()->user();
        $key = 'payment-info-' . $user->id;

        $cached = Cache::get($key);
        if (null === $cached) {
            $paymentMethodId = $user->subscription()?->latestPayment()->__get('payment_method');
            $paymentMethod = $user->findPaymentMethod($paymentMethodId)?->toArray();

            if ($paymentMethod) {
                $user->update([
                    'pm_type' => $paymentMethod['type'],
                    'pm_last_four' => $paymentMethod['card']['last4']
                ]);
            }

            Cache::put($key, now(), now()->addDay());
        }

        return view('dashboard');
    })->name('dashboard');

    Route::middleware([UnSubscribedMiddleware::class])->get('/create-subscription', [ManageSubscriptionController::class, 'createSubscription'])->name('create-subscription');

    Route::get('/billing-portal', function (Request $request) {
        return $request->user()->redirectToBillingPortal(route('profile.show'));
    })->name('billing-portal');
});
