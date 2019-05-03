<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\User;
use DB;
use Carbon;
use Content;
use App\Bill;


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
        $user = Auth()->user();
        DB::beginTransaction();
        try {
            if ($request->shipAddress==null && $request->contactNo==null ) {
                return ['success' => false, 'messageFail' => 'Please enter both shipping address and contact no.'];
            } 
            else
            {
              
                    $order = new Order();
                    $order->O_date = (Carbon\Carbon::now('Asia/Kathmandu')->toDateTimeString('Y-m-d H:i'));
                    $order->shippingAddress = $request->shipAddress;
                    $order->contactNo = $request->contactNo;
                    $order->user_id = $user->id;           
                    $order->save();         

                $getOrder = DB::table('order')->get()->last();
                foreach ($request->pId as $key => $v) {
                    $data = [
                                'order_id' => $getOrder->O_id,
                                'quantity'=> $request->qty [$key],
                                'P_id' => $request->pId [$key]
                            ];
                    Bill::insert($data);
                }
            }   
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            DB::table('addcart')->where('user_id',$user->id)->delete();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return ['success' => true, 'messagePass' => 'Your order was successful.']; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show() //for product fetch
    {
     
     $showOrders= DB::table('order')
     ->join('users', 'users.id','=','order.user_id')
     ->get();

     return view('product.customerorders',compact('showOrders'));

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
