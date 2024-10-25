<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageSubscriptionController extends Controller
{
    public function createSubscription(Request $request)
    {
        $checkoutMonthly = $request->user()
            ->newSubscription('default', config('stripe.monthly_price_id'))
            ->checkout();

        $checkoutYearly = $request->user()
            ->newSubscription('default', config('stripe.yearly_price_id'))
            ->checkout();

        //        dd($checkoutMonthly, $checkoutYearly);

        return view('create-subscription', [
            'checkoutMonthly' => $checkoutMonthly,
            'checkoutYearly' => $checkoutYearly,
        ]);
    }
}
