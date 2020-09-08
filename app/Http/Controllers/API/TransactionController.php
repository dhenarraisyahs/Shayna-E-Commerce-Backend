<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tansaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Request $request, $id){
        $product = Tansaction::with(['details.product'])->find($id);

        if($product){
            return ResponseFormatter::success($product, 'product found successfully');
        }else{
            return ResponseFormatter::error(null, 'product not found',404);
        }
    }
}
