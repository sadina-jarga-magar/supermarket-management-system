@extends('layouts.adminlayout')
@section('title') @stop
@section('content')
<div class="container" style="margin-left:10%;">

  <div class="container" style="margin-top: 4%;">
    <h1 class="text-center" style="margin-bottom: 2%; padding: -10px;"><i class="fa fa-plus"></i> INSERT PRODUCT TYPE </h1> 
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="jumbotron" style=" background: -webkit-linear-gradient(lightblue,pink,lightblue);">
        <form action="{!! url('/insertpt') !!}" method="post" enctype="multipart/form-data">
                    @csrf
            <input type="hidden" name="size" value="1000000">
		  <div class="form-group">
          <label for="product type"><i class="fa fa-product-hunt"></i> Product Type :</label>
		  <input  type="text" class="form-control" placeholder="Enter product type" name="Ptype_name" required>	
		</div>		  
       <div class="row">
          <div class="col-md-6">
            <input type="submit" name="add" class="btn btn-success form-control" value="ADD"><br><br>
          </div>
	   </div>
		
	</form>
        </div>
      </div>

      <div class="container" style="margin-left:14%;">
        <h2 style="margin-top:20%;margin-right:40%;"><u>List of product type</u></h2>
<div class="row" >
<div class="col-md-4">
<input  class="s-text7 size6 p-l-23 p-r-50"  type="text" id="myInput" onkeyup="myFunction()" placeholder="Search a product type..."
style="background: #f5f7f5;; color: rgb(61, 38, 38);margin-left:180%;margin-bottom:10px;">
</div>
</div>
        <table  id="myTable" class="table table-bordered">
            <thead>
            <tr>
                <th>SN.</th>
                <th>Product type</th>
                <th>Posted Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if($product->count())
                @foreach($product as $products)
                    <tr>
                    <td>{{$products->Ptype_id}}</td>
                        <td>{!! str_limit($products->Ptype_name,60) !!}</td>
                        <td>{!! $products->created_at !!}</td>
                        <td>
                            <a href="{!! url('product/editproducttype',$products->Ptype_id) !!}" type="button" class="btn btn-success btn-sm">Edit</a>  
                            <form action="{!! url('addproducttype',[$products->Ptype_id]) !!}" method="POST">
                            {{ csrf_field() }} 
                                {!! method_field('DELETE') !!}
                                
                              
                                <button type="submit"name="delete" onclick="if (!confirm('Are you sure to delete this medicine?')) { return false }" class="btn btn-danger btn-sm"> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4"> No record found</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

                        </div>


                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
@endsection
<script src="js/main.js"></script>

    <script>
      var msg = '{{Session::get('success')}}';
      var exist = '{{Session::has('success')}}';
      if(exist)
      {
        alert(msg);
      }
</script>
  <script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

