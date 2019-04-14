<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\User;
use DB;
use Carbon;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Product.orderdetails');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('/cart/',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $td=$request->all();
        // foreach ($td as $key => $value) {
        //     # code...
        // }
        // $order = new Order;

        // $order->O_date = (Carbon\Carbon::now('Asia/Kathmandu')->toDateTimeString('Y-m-d H:i'));
        // $order->quantity = $request->;
        // $order->P_id = $request->P_id;
        // $order->save();
        // return redirect()->to('cart');

        $user = Auth()->user();
         $data = array(
                    'O_date' => (Carbon\Carbon::now('Asia/Kathmandu')->toDateTimeString('Y-m-d H:i')),
                    'quantity'=> $request->qty,
                    'user_id' => $user->id,
                    'P_id' => $request->P_id;
                );

        Order::insert($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id) //for product fetch
    {
     
     // $order= DB::table('product')->where('P_id',$id)->get();

     // return view('cart',compact('order'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
