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
        
        // $order = new Order;

        // $order->O_date = (Carbon\Carbon::now('Asia/Kathmandu')->toDateTimeString('Y-m-d H:i'));
        // $order->quantity = $request->user_id;
        // $order->P_id = $request->P_id;
        // $order->save();
        // return redirect()->to('cart');

        // foreach ($request as $key=>$value)
        // {
        //     $data= [
        //         'P_id' => $value['P_id'],
        //         'quantity' => $value['qty'],
        //         'user_id' => $value['user_id'],
        //     ];
        // }
        // DB::table('order')->insert($data);

        $data = array();
        $data['P_id']= $request->get('P_id');
        $data['quantity']  = $request->get('qty');
        $data['user_id'] = $request->get('user_id');
        // $insertData[] = collect($data);

        DB::table('order')->insert($data);

        // $pid[]=$request->get('P_id');
        // $userid[]=$request->get('user_id');
        // $quantity[]=$request->get('qty');




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
