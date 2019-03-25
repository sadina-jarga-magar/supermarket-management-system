@extends('layouts.adminlayout')
@section('title') @stop
@section('content')


<div class="container" style="margin-left:22%;">
<div class="row" >
<div class="col-md-4">
<input  class="s-text7 size6 p-l-23 p-r-50" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search a product.."
style="background: #f5f7f5;; color: rgb(61, 38, 38);margin-left:2%;margin-top:30px;">
</div>
</div>

        <h2>List of all product</h2>
        <a href="/insertp" type="button" class="btn btn-primary btn-sm float-right mb-2">Add New </a>
        <table  id="myTable" class="table table-bordered">
            <thead>
            <tr>
                <th>SN.</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Image</th>
                <th> Manufactured Date</th>
                <th> Expired Date</th>
                <th>Rate</th>
                <th>Posted Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                    <td>{!! $product->P_id !!}</td>
                        <td>{!! str_limit($product->P_name,60) !!}</td>
                        <td>{!! str_limit($product->P_description,2000) !!}</td>
                        <td>
                            <img src="/{{ $product->P_img}}" style="height:100px; width:110px;">
                        </td>
                        <td> {!! str_limit($product->P_mfdate) !!}</td>
                        <td>{!! str_limit($product->P_expdate) !!}</td>
                        <td>{!! str_limit($product->Rate) !!}</td>
                        <td>{!! $product->created_at !!}</td>

                        <td>
                            <!-- <form action="{!! url('product/insertp',[$product->P_id]) !!}" method="POST">
                            {{ csrf_field() }} 
                                {!! method_field('put') !!}
                                 <button type="submit" name="edit" class="btn btn-primary btn-sm"> Edit</button>
                            </form> -->
                            <a href="{!! url('product/editproduct',$product->P_id) !!}" type="button" class="btn btn-success btn-sm">Edit</a>  
                                                   
                            <form action="{!! url('insertpindex',[$product->P_id]) !!}" method="POST">
                            {{ csrf_field() }} 
                                {!! method_field('DELETE') !!}
                                
                               
                                <button type="submit"name="delete" class="btn btn-danger btn-sm"> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @stop

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
