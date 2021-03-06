<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;
use App\Http\Controllers\Traits\ConvertCurrencyTrait;

class PaymentController extends Controller
{

    use ConvertCurrencyTrait;

    public function getStripeForm() {
        // $cost = $this->convertWithEnvRate(20);
        // dd($cost);

        $user = Auth::user()->credits;
        $userId = Auth::user();

        return view('payment')->with(compact('user','userId'));
    }

    public function postStripePayment(Request $r) {

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $price = $this->convertWithEnvRate($r->credits) *100;

        $currentUser = Auth::user();
        $description = "De gebruiker".$currentUser->name." heeft credits aangekocht";

        $charge = Charge::create([
            'amount' => $price,
            'currency' => 'eur',
            'source' => $r->stripeToken,
            'description' => $description
        ]);

        if($charge->status == 'succeeded') {
            $currentUser->credits += $r->credits;
            $currentUser->save();

            $r->session()->flash('success', 'Je hebt succesvol'. $r->credits .'credits aangekocht');
        }else {
            $r->session()->flash('error', 'aj aj aj');
        }

        return back();
    }

}
