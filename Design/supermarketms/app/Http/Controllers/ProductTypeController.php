<?php

namespace App\Http\Controllers;
use App\ProductType;

use Illuminate\Http\Request;
use DB;


class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product= new ProductType();
        $products = $product->get();
        return view('product.insertpt',[
            'product' => $products
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
        // $this->validate(request(), [
        //     'Ptype_name' => 'required | max:150',
           
        // ], [
        //     'Ptype_name.required' => 'Product name is required'
        // ]);
        $producttype=new ProductType;
        $producttype->Ptype_name=$request->Ptype_name;
        $producttype->save();
        return redirect()->to('/addproducttype')->with('success','Product type is added,successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $producttype)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producttype = ProductType::find($id);
        return view('product.editproducttype')->with('producttype',$producttype); //producttype is objects
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producttype=ProductType::find($id);
        $producttype->Ptype_name=$request->Ptype_name;
        $producttype->save();
        return redirect()->to('/addproducttype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=ProductType::find($id);
        $product->delete();
         return redirect()->to('/addproducttype')->withSuccess('Product type is deleted successfully!!');
    }

    public function category()
    {
        $producttype=new ProductType();
        $producttype=$producttype->get();





     $getpro = DB::table('product')->get()->toArray();
       return view('product',compact('producttype','getpro'));

     
    }
}
