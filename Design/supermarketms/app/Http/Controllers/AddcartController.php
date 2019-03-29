<?php

namespace App\Http\Controllers;

use App\Addcart;
use Illuminate\Http\Request;
use DB;

class AddcartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        //     //For duplicate products
        //     $count_duplicateProducts = Cart::where([
        //         'product_id' => $inputToCart['product_id'],
        //         // Add if products details are available
        //     ])->count();
        //     if ($count_duplicateProducts > 0) {
        //         return back()->with('message', 'Product is already added!!');
        //     } else {
        //         //Cart added
        //         Cart::create($inputToCart);
        //         return back()->with('message', 'Product added to card');
        //     }
        // } else {
        //     return back()->with('message', 'Stock is not available');
        // }


        // $duplicate_product=Addcart::where('P_id',$request->$id);
        // return $duplicate_product;

        $duplicate_product=DB::table('addcart')->where('P_id',$request->$id);

        // return $duplicate_product;
        if($duplicate_product->count()>0){
            return back()->with('message', 'Product is already added!!');
        }else{

            $cart = new Addcart;
            $cart->P_id=$id;
            $cart->user_id=$request->user_id;
            $cart->save();
            return redirect()->back()->with('passed','your product is added in your cart!!');            
        }




        // $user =auth()->user();
        // //$user=$request->user_id;
        // //$cart = new Addcart;
        // $carts=Addcart::all();
        // foreach($carts as $cart )
        // {
        //     if($cart->P_id==$id && $cart->user_id==$user)
        //     {
        //   return redirect()->back()->with('passed','your product is already added in your cart!!');

        // }
        // else
        // {
        // $cart = new Addcart;
        // $cart->P_id=$id;
        // $cart->user_id=$request->user_id;
        // $cart->save();
        // return redirect()->back()->with('passed','your product is added in your cart!!'); 
        // }
      
        // }
        

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
     * @param  \App\Addcart  $addcart
     * @return \Illuminate\Http\Response
     */
    public function show(Addcart $addcart)
    {
        $user =auth()->user();
          $order= DB::table('addcart')
          ->join('product','product.P_id','=','addcart.P_id')
          ->where('user_id',$user->id)->get();
          $total=0;

          
          foreach($order as $orders)
          {
            $total=$total+$orders->Rate;
          }

     return view('/cart',compact('order','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Addcart  $addcart
     * @return \Illuminate\Http\Response
     */
    public function edit(Addcart $addcart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Addcart  $addcart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Addcart $addcart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Addcart  $addcart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delcart=Addcart::find($id);
        $delcart->delete();
         return redirect()->to('/cart')->withSuccess('Product is deleted from your cart successfully!!');
    }

    
}
