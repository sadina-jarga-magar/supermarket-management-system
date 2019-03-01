<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class ProductController extends Controller
{
    protected $image_dir = "uploads/pro duct";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function index()
    {
        $product = Product::get();
        return view('product.insertpindex',[
            'product' => $product
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

        if (request()->hasFile('P_img')) {
            $P_img = request()->file('P_img');
            $file_extension = $P_img->getClientOriginalExtension();
            $file_name = md5(time()) . '.' . $file_extension;
            $P_img->move($this->image_dir, $file_name);
            $product->P_img = $file_name;
        }
        $product->P_name = $form_req['P_name'];
        $product->P_description = $form_req['P_description'];
        $product->P_mfdate = $form_req['P_mfdate'];
        $product->P_expdate = $form_req['P_expdate'];
        $product->Rate = $form_req['Rate'];
        $status = $product->save();
        return redirect()->to('product');

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
        $product = Product::find($id);
        if(!$product) {
                return redirect()->back();
        }
        return view ('product.edit', [
            'products' => $product
        ]);
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
        //
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
