<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tansaction;
use App\Models\TansactionDetail;
use App\Models\Product;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $income = Tansaction::where('transaction_status','PENDING')->sum('transaction_total');
        $sales = Tansaction::count();
        $new_sales = Tansaction::orderBy('id','DESC')->take(5)->get();
        $pie_status = [
            'pending' => Tansaction::where('transaction_status','PENDING')->count(),
            'success' => Tansaction::where('transaction_status','SUCCESS')->count(),
            'failed' => Tansaction::where('transaction_status','FAILED')->count()
        ];
        return view('pages.dashboard')->with([
            'income' => $income,
            'sales' => $sales,
            'new_sales' => $new_sales,
            'pie_status' => $pie_status
        ]);
    }
}
