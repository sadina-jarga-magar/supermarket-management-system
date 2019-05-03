@extends('layouts.app')
@section('title') @stop
@section('content')
<!-- Title Page -->
	<section class="bg-title-page p-t-100 flex-col-c-m" style="background-image: url(images/cart.jpg);">
		<h2 class="l-text2 t-center">
			Orders
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<thead class="bg-light">
							<tr class="table-head">
								<th class="column-1">Order date</th>
								<th class="column-2">Shipping Address</th>
								<th class="column-3">Contact No</th>
								<th class="column-3">Action</th>
							</tr>
						</thead>


						<tbody>
							@if($orders->count()>0)
							@foreach($orders as $products)
						<tr class="table-row">
							<td class="column-1">{{$products->O_date}}</td>
							<td class="column-1">{{$products->shippingAddress}}</td>
							<td class="column-2">{{ $products->contactNo}}</td>
						
						<td class="column-6 text-center"> 
							<form action="{!! url('/genBill') !!}" method="POST">
                            {{ csrf_field() }} 
                            {!! method_field('GET') !!}  
                            	<input type="hidden" name="oId" value="{{ $products->O_id}}" readonly>
                               
                                <button type="submit" name="genBill" class="btn btn-primary btn-sm mr-4">Generate Bill</button>
                            </form>
                            <br>
							<form action="{!! url('',[$products->O_id]) !!}" method="POST">
	                            {{ csrf_field() }} 
	                                {!! method_field('DELETE') !!}  
	                        	<button type="submit"name="delete" onclick="if (!confirm('Are you sure to delete this product?')) { return false }" class="btn btn-danger btn-sm mr-4">Cancel</button>
	                         </form>
                            
                            
                        </td>
                        </tr>
						@endforeach
						@else
						
				   <h1 class="text-center">You don't have order list !!</h1>
         
            @endif
        </tbody>
    </table>
        
        <br>
        <br>
        <br>
</div>
</div>
<br><br><br>
<br><br><br>
<br><br><br>


<script>
      var msg = '{{Session::get('success')}}';
      var exist = '{{Session::has('success')}}';
      if(exist)
      {
        alert(msg);
      }
</script>
       
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>

</div>

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
    if (td.innerHTML.toUpperCase().indexOf(filter) > -1)
    {
        tr[i].style.display = "";
    }
    else
    {
        tr[i].style.display = "none";
    }
    } 
  }
}
</script>

<script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
    $('#btnConfirm').click(function(e){
            e.preventDefault();
            var pId = $("input[name='pId[]']").map(function(){return $(this).val();}).get();
            var qty = $("input[name='qty[]']").map(function(){return $(this).val();}).get();
            var shipAddress = $('#address').val();
            var contactNo = $('#phone_no').val();

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
							url: "{{URL('/order')}}",
							method: 'post',
							data: {
								pId : pId,
								qty : qty,
								shipAddress : shipAddress,
								contactNo : contactNo
							},
							success:function(response){
								console.log(response);
								if (response.success==true) {
						            alert(response.messagePass);
						            location.reload();
						        }
						        else{
						            alert(response.messageFail);
						        }
							}
							
						});
					}); 
</script>
@endsection