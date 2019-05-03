@extends('layouts.app')
@section('title') @stop
@section('content')
<!-- Title Page -->
	<section class="bg-title-page p-t-100 flex-col-c-m" style="background-image: url(images/cart.jpg);">
		<h2 class="l-text2 t-center">
			Cart
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
								<th class="column-1">Image</th>
								<th class="column-2">Product</th>
								<th class="column-3">Price</th>
								<th class="column-4 p-l-70">Quantity</th>
								<th class="column-5">Total</th>
								<th class="column-6">Action</th>
							</tr>
						</thead>


						<tbody>
							@if($order->count()>0)
							@foreach($order as $products)
						<tr class="table-row">

							<td style="display: none;" class="pid">
								<input type="text" name="pId[]" value="{{ $products->P_id}}" readonly>
							</td>
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="/{{ $products->P_img}}"  style="height:100px;width:110px;"alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2">{{ $products->P_name}}</td>
							<td class="column-3 price" name="price">{{ $products->Rate}}</td>
							<td class="column-4">
									<input type="number" name="qty[]" class="qty text-center bg-light pt-2 pb-2" value="1" min="1" oninput="validity.valid||(value='');">
							</td>

                                  
							<td class="column-5 total">  
								{{ $products->Rate}}
                                  </td>
						
						<td class="column-6"> 
						 <form action="{!! url('cart',[$products->id]) !!}" method="POST">
                            {{ csrf_field() }} 
                                {!! method_field('DELETE') !!}
                                
                              
                                <button type="submit"name="delete" onclick="if (!confirm('Are you sure to delete this product?')) { return false }" class="btn btn-danger btn-sm mr-4"> Delete</button>
                            </form>
                        </td>
                        </tr>
						@endforeach
						@else
						
					<h2 class="text-center">Your cart is empty right now!!</h2>
                                  
						@endif
						</tbody>
					</table>

					<br>
					<br>

					<div class="size12" style="margin-left:80%;">
						 <a href="/product" type="button" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Continue shopping</a>
					
				</div>

					<!-- online resource for jquery -->
					<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->


					<!-- offline resource for jquery  -->
					<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
					<script type="text/javascript">
						$(document).ready(function(){

							var prices = $('.total');
							var total = 0;
							var Gtotal = 0;
							 $.each(prices, function(i, price){
							  var pc=$(this).text();  
							  if (pc!= 'NA'){
							       total = total + parseInt(pc,10);
							       Gtotal = total + 100;
							  }});
							$('#subTotal').text(total);
							$('#GTotal').text(Gtotal);



							$('.qty').change(function () {
						    
						    var q = $(this).val();
						    var p = $(this).closest('tr').find('.price').text();
						    var tot = p*q;

						    $(this).closest('tr').find('.total').text(tot);

						    var prices = $('.total');
							var total = 0;
							var Gtotal = 0;
							 $.each(prices, function(i, price){
							  var pc=$(this).text();  
							  if (pc!= 'NA'){
							       total = total + parseInt(pc,10);
							       Gtotal = total + 100;
							  }});
							$('#subTotal').text(total);
							$('#GTotal').text(Gtotal);
						});	

							$('.qty').keyup(function () {
						    
						    var q = $(this).val();
						    var p = $(this).closest('tr').find('.price').text();
						    var tot = p*q;

						    $(this).closest('tr').find('.total').text(tot);

						    var prices = $('.total');
							var total = 0;
							var Gtotal = 0;
							 $.each(prices, function(i, price){
							  var pc=$(this).text();  
							  if (pc!= 'NA'){
							       total = total + parseInt(pc,10);
							       Gtotal = total + 100;
							  }});
							$('#subTotal').text(total);
							$('#GTotal').text(Gtotal);
						});	
						});
						
                    </script>
				</div>
			</div>

			

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm" id="subTotal">
						
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

					<div class="w-size20 w-full-sm">
						Rs. <label>100</label>
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Grand Total:
					</span>


					<span class="m-text21 w-size20 w-full-sm">
						<label  id="GTotal"></label>
					</span>
				</div>

				<div class="size15 trans-0-4">

												@auth
												<input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
												@endauth
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" data-toggle="modal" data-target="#g" type="button">
						Confirm order
					</button>

        <!-- Modal -->
<div class="modal fade" id="g" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" style="text-align:center;">Delivery details</h3>
      </div>
    <div class="modal-body">
    <div class="">
    <article class="card-body mx-auto" style="">
    	<form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }} 
                        <!-- session create gareko Csrf le chai  -->
   


        <!-- Address -->
        <div class="form-group input-group{{ $errors->has('address') ? ' has-error' : '' }}">
          <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
           </div>
              <input id="address" name="address" class="form-control" placeholder="Shipping address" type="text" value="{{ old('address') }}" required autofocus>
              @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
            @endif
          </div>


          <!-- Phone number -->
        <div class="form-group input-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
        	<div class="input-group-prepend">
    		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
    		</div>
        	<input id="phone_no" name="phone_no" class="form-control" placeholder="Phone number" type="text" value="{{ old('phone_no') }}" required autofocus>
            @if ($errors->has('phone_no'))
                                    <span class="help-block">
                                    </span>
            @endif
        </div>


        <!-- Create account button -->
        <div class="form-group">
            <button id="btnConfirm" class="flex-c-m bg1 bo-rad-25 hov1 s-text1 trans-0-4 pull-right btn-lg">Check out </button>
        </div> 
    </form>
    </article>
    </div>
    </div> 
    </div>
  </div>
</div>
				</div>
			</div>
		</div>
	</section>
@endsection

<script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnConfirm').click(function(e){
			e.preventDefault();
				var pId = $("input[name='pId[]']").map(function(){return $(this).val();}).get();
				var qty = $("input[name='qty[]']").map(function(){return $(this).val();}).get();
				var shipAddress = $('#address').val();
				var contactNo = $('#phone_no').val();
				
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

				$.ajax({
							url: "{{URL('/orderCart')}}",
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
	});
</script>


    <script>
      var msg = '{{Session::get('success')}}';
      var exist = '{{Session::has('success')}}';
      if(exist)
      {
        alert(msg);
      }
</script>


   
    