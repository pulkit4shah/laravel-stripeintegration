<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wallet;
use Validator;

class Wallets extends Controller
{
    //
    public function save(Request $req){
        $valid = Validator::make($req->input(),[
            "user_id"=>"required",
            "email"=>"required",
            'credit'=>"required",
            'debit'=>"required",
        ]);
        if($valid->fails())
        {
            return response()->json(['error'=>$valid->errors()],401);
        }
        $wallet = new Wallet;
        $wallet->user_id = $req->user_id;
        $wallet->email = $req->email;
        $wallet->credit = $req->credit;
        $wallet->debit = $req->debit;
        if($wallet->save())
        {
            return "Wallet entry successfully";
        }
    }
    public function update(Request $req){
        $wallet = Wallet::find($req->id);
        $wallet->user_id = $req->user_id;
        $wallet->credit = $req->credit;
        $wallet->debit = $req->debit;
        if($wallet->save())
        {
            return ['result'=>"Success","msg"=>"data is updated"];
        }
    }
}
