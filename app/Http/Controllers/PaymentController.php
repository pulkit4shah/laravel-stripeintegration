<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallet;
use App\User;
use DB;
use Session;
class PaymentController extends Controller
{
    public function paymentProcess(Request $req){
        $user = DB::table('users')->where('email', $req->input('stripeEmail'))->first();
        if(empty($user))
        {
            return view('welcome',['data'=>"payment not done"] );
        }else
        {
            \Stripe\Stripe::setApiKey('sk_test_H2lhSD7nBjKO9d1UBbmYuQGk00QDdQXAFa');
            $token = $req->input('stripeToken');
            $charge = \Stripe\Charge::create([
                'amount'=>1000,
                'currency'=>'usd',
                'description'=>'Example charge',
                'source'=>$token
            ]);
            $wallet = new Wallet;
            $wallet->user_id = $user->id;
            $wallet->email = $req->input('stripeEmail');
            $wallet->credit = $charge->amount;
            $wallet->debit = '0';
            if($wallet->save())
            {
                return view('welcome',['data'=>"congrats payment done successfully."] );
            }
        } 
    }
}
