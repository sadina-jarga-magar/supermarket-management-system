<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class ProductController extends Controller
{
   
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
        // $this->validate(request(), [
        //     'P_name' => 'required | max:150',
        //     'P_description' => 'nullable|max:1200',
            
        // ], [
        //     'P_name.required' => 'Product name is required'
        // ]);
        $req = request();
        $form_req = $req->all();
        $product = new Product();
//image
       $pictureInfo = $request->file('P_img');

        $picName = $pictureInfo->getClientOriginalName();

        $folder = "itemImages/";

        $pictureInfo->move($folder,$picName);

        $picUrl = $folder.$picName;
        if(Product::where('P_img', '=', $picUrl)->exists()) //Product from model name.
        {
            return redirect('/insertp')->with('itemNameExists','Please!!insert image with another name');
        }
        //
        $product->P_name = $form_req['P_name'];
        $product->P_description = $form_req['P_description'];
        $product->P_img=$picUrl;
        $product->P_mfdate = $form_req['P_mfdate'];
        $product->P_expdate = $form_req['P_expdate'];
        $product->Rate = $form_req['Rate'];
        $product->Ptype_id = $form_req['Ptype_name'];
        $status = $product->save();
        return redirect()->to('insertpindex');

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

        $producttype = new ProductType();
        $producttype = $producttype->get();
        return view('product.editproduct',['product'=>$product],[
            'producttype'=>$producttype]);

      // return view('product.editproduct')->with('product',$product);
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
        $pro->Ptype_id=$request->Ptype_name;
        $pro->P_name=$request->P_name;
        $pro->P_description=$request->P_description;
        $pro->P_img=$request->P_img;
        $pro->P_mfdate=$request->P_mfdate;
        $pro->P_expdate=$request->P_expdate;
        $pro->Rate=$request->Rate;
        $pro->save();
        return redirect()->to('insertpindex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
         return redirect()->to('/insertpindex')->withSuccess('Product is deleted successfully!!');

    }
    public function getProductType()
    {
        $producttype = new ProductType();
        $producttype = $producttype->get();
        return view('product.insertp',[
            'producttype'=>$producttype]);

  

    }
    
//     public function retrievept()
//     {
//      $getpt = DB:table('product')
//         ->join('producttype','producttype.Ptype_id','=','product.P_id')
//         ->get();
//         return view('/')
// }


    
}

