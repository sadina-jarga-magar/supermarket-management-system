<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class ProductController extends Controller
{
    protected $image_dir = "uploads/product";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function index()
    {
        $products =  Product::get();
        return view('product.insertpindex', [
            'products' => $products
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.insertp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'P_name' => 'required | max:150',
            'P_description' => 'nullable|max:1200',
            'P_img' => 'nullable'
        ], [
            'P_name.required' => 'Product name is required'
        ]);
        $req = request();
        $form_req = $req->all();
        $product = new Product();

       
        
        $product->P_name = $form_req['P_name'];
        $product->P_description = $form_req['P_description'];
        //$product->P_img=$form_req['P_img'];
        $product->P_mfdate = $form_req['P_mfdate'];
        $product->P_expdate = $form_req['P_expdate'];
        $product->Rate = $form_req['Rate'];
        $status = $product->save();
        return redirect()->to('insertp');

    }

    /**
     * Dilay the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
       return view('product.editproduct');
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
        $pro=Product::find($id);
        $pro->P_name-$request->P_name;
        $pro->P_description-$request->P_description;
        $pro->P_mfdate-$request->P_mfdate;
        $pro->P_expdate-$request->P_expdate;
        $pro->Rate-$request->Rate;
        $pro->save();
        return redirect()->to('editproduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();

    }
}
