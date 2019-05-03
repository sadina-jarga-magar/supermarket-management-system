<!-- Product -->
					<div class="row">
				@foreach ($getpro as $products)

						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
									<img src="/{{ $products->P_img}}" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
									<!--for add to cart-->
											<form action="{{url('/addcart',$products->P_id)}}" method="post">
												@csrf
												@auth
												<input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
												@endauth
											<button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" class="block2-btn-addcart">
												Add to Cart
											</button>
									</form>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.html" style="font-weight:bold;font-size:20px;" class="block2-name dis-block s-text3 p-b-5">
										{!! $products->P_name !!}
									</a>

									<span class="block2-price m-text6 p-r-5">
										Rs {!! $products->Rate !!}
									</span>
									
								</div>

								<style type="text/css">
									.viewmore:hover
									{
										text-decoration: underline;
									}
								</style>

								<a  style="color:blue;" class="viewmore"  data-toggle="collapse" data-parent="#accordion" href="#{{ $products->P_id}}"> View More</a>

								<div class="block2-txt p-t-20 panel-collapse collapse in" id="{{ $products->P_id}}" >
									<a href="#" class="block2-name dis-block s-text3 p-b-5">
										Description: {!! $products->P_description !!}
									</a>
									<a href="#" class="block2-name dis-block s-text3 p-b-5">
										Mfd: {!! $products->P_mfdate !!}
									</a>
									<a href="#" class="block2-name dis-block s-text3 p-b-5">
										Exp: {!! $products->P_expdate !!}
									</a>
										<a href="#" class="block2-name dis-block s-text3 p-b-5">
										Category: {!! $products->Ptype_name !!}
									</a>
									<a href="#" class="block2-name dis-block s-text3 p-b-5">
										Available quantity: {!! $products->Quantity !!}
									</a>
									
									

									
								</div>
							</div>
						</div>
@endforeach