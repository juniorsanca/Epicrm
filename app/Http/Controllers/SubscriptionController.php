<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Plan;
use App\User;

class SubscriptionController extends Controller
{
    //
    /*protected $stripe;

    public function __construct()
    {
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    }
    */

    public function create(Request $request, Plan $plan)
    {
        $plan = Plan::findOrFail($request->get('plan'));

        $user = $request->user();
        $paymentMethod = $request->paymentMethod;

        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user->newSubscription('default', $plan->stripe_plan)
            ->create($paymentMethod, [
                'email' => $user->email,
            ]);

        return redirect()->route('home')->with('success', 'Your plan subscribed successfully');
}

    public function createPlan()
    {
        return view('plans.create');
    }

    public function storePlan(Request $request)
    {
        $data = $request->except('_token');

        $data['slug'] = strtolower($data['name']);
        $price = $data['cost'] * 100;

        //create stripe product
        $stripeProduct = $this->stripe->products->create([
            'name' => $data['name'],
        ]);

        //Stripe Plan Creation
        $stripePlanCreation = $this->stripe->plans->create([
            'amount' => $price,
            'currency' => 'eur',
            'trial_end' => 604800,
            'interval' => 'month', //  it can be day,week,month or year
            'product' => $stripeProduct->id,
        ]);


        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        /*$stripe = new \Stripe\Stripe::setApiKey('sk_test_51IzzdXKwQ6DJ7yi5dQr2S6lIF1pTToZWVxZQK9ddcFBIUOuyILzpfIqc4at91xi9R9fpI9v6bJrcdzHk6s813N6c00KZ20FMB2');

        $subscription = \Stripe\Subscription::create([
            'customer' => '{{CUSTOMER_ID}}',
            'items' => [[
                'price_data' => [
                    'unit_amount' => 5000,
                    'currency' => 'usd',
                    'product' => '{{PRODUCT_ID}}',
                    'recurring' => [
                        'interval' => 'month',
                    ],
                ],
            ]],
        ]);
*/

        $data['stripe_plan'] = $stripePlanCreation->id;

        Plan::create($data);

        echo 'plan has been created';
    }
}
