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
					<table class="table-shopping-cart" id="tableCalc">
						<thead>
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
							@foreach($order as $products)
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="/{{ $products->P_img}}"  style="height:100px;width:110px;"alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2">{{ $products->P_name}}</td>
							<td class="column-3" id="price" class="price" name="price">{{ $products->Rate}}</td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product"  type="number" name="qty" class="qty" value="0" id="amt">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" id ="btn11" onclick="calc()" aria-hidden="true"></i>
									</button>
								</div>
							</td>

                                  
							<td class="column-5">  
								<label class="total" name="total" id="total"></label>
                                  </td>
						
						<td class="column-6"> 
						 <form action="{!! url('cart',[$products->id]) !!}" method="POST">
                            {{ csrf_field() }} 
                                {!! method_field('DELETE') !!}
                                
                              
                                <button type="submit"name="delete" class="btn btn-danger btn-sm"> Delete</button>
                            </form>
                        </td>
                        </tr>
						@endforeach
						</tbody>
					</table>
					<script src="{{asset('js/app.js')}}"></script>
					<script type="text/javascript">
						function calc(){

						var amt = document.getElementById("amt").value;

						var price = document.getElementById("price").textContent;

						var total = amt * price;
						document.getElementById("total").innerHTML = total;
						//alert(price);

						}


							/*

                                  	var $tblrows = $("#tableCalc tbody tr");
									$tblrows.each(function (index) {
									    var $tblrow = $(this);

									    $tblrow.find('.qty').on('change', function (index) {
										var qty = $tblrow.find("[name=qty]").val();
										alert("lllllll"+qty);
										var price = $tblrow.find("[name=price]").textContent;
										var subTotal = parseInt(qty,10) * parseFloat(price);
									// if (!isNaN(subTotal)) {
 
									    $tblrow.find("[name=total]").textContent(subTotal);
									// }

									});
									});

									*/
                                  </script>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
				</div>
				
				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<form method="post" action="{{url('/orderproduct',$products->P_id)}}">
												@csrf
												{{ method_field('put')}}

												<input type="hidden" name="P_id" value="{{$products->P_id}}" />
												@auth
												<input type="hidden" name="user__id" value="{{Auth::user()->id}}" />
												@endauth
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Confirm cart
					</button>
						</form>
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

					<span class="m-text21 w-size20 w-full-sm">
						Rs 120
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23">
							There are no shipping methods available. Please double check your address, or contact us if you need any help.
						</p>
						<div class="size14 trans-0-4 m-b-10">
							<!-- Button -->
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Update Totals
							</button>
						</div>
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<!-- {!! $total !!} -->
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Proceed to Checkout
					</button>
				</div>
			</div>
		</div>
	</section>
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


   
    