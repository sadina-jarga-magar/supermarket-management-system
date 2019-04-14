@extends('layouts.app')
@section('title') @stop
@section('content')
<!-- Title Page -->
	<section class="bg-title-page p-t-90 flex-col-c-m" style="background-image: url(images/aboutpic.jpg);">
		<h2 class="l-text2 t-center">
			Save Time Save Money
		</h2>
		<p class="m-text13 t-center">
			Grocery shop
		</p>
	</section>

<div>
    @if (count($errors) > 0)
    <div class="alert alert-danger container-fluid">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif @if(Session::has('message'))
    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        {{Session::get('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif
</div>
	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>
						@foreach ($producttype as $producttypes)
						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="#" class="s-text13 active1">
									{!! $producttypes->Ptype_name !!}
								</a>
							</li>
							@endforeach
						</ul>
						<form action="/" method="post" role="search">
							@csrf
						<div class="search-product pos-relative bo4 of-hidden input-group">
							<input class="s-text7 size6 p-l-23 p-r-50 form-control" type="text" name="search" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</form>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">

						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>
					</div>
					<script type="text/javascript">.0
						var exist='{{Session::has('passed')}}';
						var msg='{{Session::get('passed')}}';
						if(exist)
						{
							alert(msg);
						}
					</script>

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
						
					</div>
					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	@endsection