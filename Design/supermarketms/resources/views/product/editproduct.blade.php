@extends('layouts.adminlayout')
@section('title')  Edit product @stop
@section('content')
<div class="container" style='margin-left:10%'>
        @if(session()->has('success'))
            <div class="alert-success">
                <h1> {!! session()->get('success') !!}</h1>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li> {{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
  <div class="container" style="margin-top: 4%;">
 
    <h1 class="text-center" style="margin-bottom: 2%; padding: -10px;"><i class="fa fa-plus"></i> EDIT PRODUCT</h1> 
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="jumbotron" style=" background: -webkit-linear-gradient(lightblue,pink,lightblue);">
          <form  action="{!! url('insertpindex',$product->P_id) !!}" method="POST" enctype="multipart/form-data">
          @csrf
          {!! method_field('put') !!}
            <input type="hidden" name="size" value="1000000">
             <div class="form-group">
            <label for="product name"><i class="fa fa-product-hunt"></i> Product Type:</label>
            <select class="form-control" placeholder="Choose your product type" name="Ptype_name" required> 
           @foreach($producttype as $prod)
           <option value="{{ $prod->Ptype_id }}">{{$prod->Ptype_name}}</option>
           @endforeach
            </select>
       </div> 
			<div class="form-group">
                <label for="product name"><i class="fa fa-product-hunt"></i> Product Name :</label>
		        <input type="text" class="form-control" value="{!! $product->P_name !!}" name="P_name" required>	
		   </div>	

            <div class="form-group">
              <label for="product description"><i class="fa fa-sticky-note" ></i> Product Description :</label>
              <textarea class="form-control" name="P_description" rows="4" > 
            {!! $product->P_description !!}
			</textarea>
			</div>

      <div class="form-group">
            <label for="image"><i class="fa fa-file-image-o"></i> Image :</label>
              <input type="file" accept=".png, .jpg, .jpeg"  id="uploadImage" name="P_img" class="form-control{{ $errors->has('P_img') ? ' is-invalid' : '' }}" >
              @if ($errors->has('P_img'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('P_img') }}</strong>
                                    </span>
                  <img src=" /{{$product->P_img}} "  style="height:200px;width:280px;" class="img-fluid img-thumbnail" style="max-width:100%">                @endif
         
        
            </div>
			
			
     
      <div class="form-group">
        <img src=" /{{$product->P_img}} "  style="height:200px;width:280px;" class="img-fluid img-thumbnail" style="max-width:100%"></div>
 
			
			<div class="form-group">
            <label for=" manufacture date"><i class="fa fa-calendar"></i>  Manufactured Date :</label>
            <input type="date" class="form-control" value="{!! $product->P_mfdate !!}" name="P_mfdate" required>
            </div>
			
			<div class="form-group">
            <label for=" expired date"><i class="fa fa-calendar"></i>  Expired Date :</label>
            <input type="date" class="form-control" value="{!! $product->P_expdate !!}" name="P_expdate"  required>
            </div>
			
			<div class="form-group">
            <label for=" rate"><i class="fa fa-money"></i>  Rate :</label>
            <input type="form-control"  class="form-control" value="{!! $product->Rate !!}" name="Rate" required>
            </div>


      <div class="form-group">
            <label for="qty"><i class="fa fa-sort-numeric-asc"></i>  Quantity :</label>
            <input type="form-control"  class="form-control" value="{!! $product->Quantity  !!}" name="Quantity" required>
            </div>
          
		<div class="row">
          <div class="col-md-6">
			<input type="submit" name="update" class="btn btn-info form-control" value="UPDATE">
          </div>
        </div>
	  </form>
     </div>
   </div>

   
  </div>
   </div>

@endsection
