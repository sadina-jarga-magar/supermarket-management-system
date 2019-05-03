<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $orders = DB::table('order')->where('user_id',$user->id)->get();
        return view('product.orders', compact('orders'));
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
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $bill = DB::table('order')->where('O_id', $request->oId)->get()->first();

        $billProduct = DB::table('bill')
            ->join('product', 'product.P_id','=','bill.P_id')
            ->where('bill.order_id', $request->oId)
            ->get();

        return view('product.generatingbill', compact('bill', 'billProduct'));
    }

    public function showAdminBill(Request $request)
    {
        $bill = DB::table('order')->where('O_id', $request->oId)->get()->first();

        $billProduct = DB::table('bill')
            ->join('product', 'product.P_id','=','bill.P_id')
            ->where('bill.order_id', $request->oId)
            ->get();

        return view('product.adminBill', compact('bill', 'billProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
