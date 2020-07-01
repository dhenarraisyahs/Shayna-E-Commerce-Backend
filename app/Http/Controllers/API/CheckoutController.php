<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use App\Models\Tansaction;
use App\Models\TansactionDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request){
        // get all data from user to $data variabel 
        $data = $request->except('transaction_details');
        // make random uuid format / trx id
        $data['uuid'] = 'TRX'.mt_rand(10000,99999).mt_rand(100,999);
        //insert transaction header first
        $transaction = Tansaction::create($data);
        //then insert the trx details one by one using foreach
        foreach ($request->transaction_details as $product) {
            $details[] = TansactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product
            ]);
            // decrease product quantity everytime the item insert to the trx detail
            Product::find($product)->decrement('quantity');
        }
        // save the trx
        $transaction->details()->saveMany($details);
        return ResponseFormatter::success($transaction);
    }
    //
}
