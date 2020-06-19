<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tansaction;
use App\Models\TansactionDetail;
use App\Models\Product;
use App\Http\Requests\TransactionRequest;


class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Tansaction::all();

        return view('pages.transactions.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Tansaction::with('details.product')->findOrFail($id);

        return view('pages.transactions.show')->with([
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Tansaction::findOrFail($id);

        return view('pages.transactions.edit')->with([
            'item' =>$item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        $data = $request->all();

        $item = Tansaction::findOrFail($id);
        $item->update($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function setStatus(Request $request, $id){
        $request->validate([
            'status' => 'required|in:PENDING,SUCCESS,FAILED'
        ]);

        $item = Tansaction::findOrFail($id);

        $item->transaction_status = $request->status;

        $item->save();

        return redirect()->route('transaction.index');
    }
}
