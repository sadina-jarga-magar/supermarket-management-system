@extends('layouts.adminlayout')
@section('title')  @stop
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
 
    <h1 class="text-center" style="margin-bottom: 2%; padding: -10px;"><i class="fa fa-plus"></i> EDIT PRODUCT TYPE</h1> 
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="jumbotron" style=" background: -webkit-linear-gradient(lightblue,pink,lightblue);">
          <form  action="{!! url('insertpt',$producttype->Ptype_id) !!}" method="POST" enctype="multipart/form-data">
          @csrf
          {!! method_field('put') !!}
            <input type="hidden" name="size" value="1000000">
			<div class="form-group">
                <label for="product type name"><i class="fa fa-product-hunt"></i> Product Type :</label>
		        <input type="text" class="form-control" value="{!! $producttype->Ptype_name !!}" name="Ptype_name" required>	
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
