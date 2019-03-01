@extends('layouts.adminlayout')
@section('title') @stop
@section('content')

<div class="container1-page">
	<!-- Slide1 -->
	<section class="slide1 rs1-slick1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(images/d.jpg);">
					<div class="wrap-content-slide1 size24 flex-col-c-m p-l-15 p-r-15 p-t-120 p-b-170">
						<h2 class="caption1-slide1 xl-text3 t-center bo15 p-b-3 animated visible-false m-b-25" data-appear="fadeInUp">
							 Welcome in our dashboard
						</h2>
					</div>
				</div>

				<div class="item-slick1 item1-slick1" style="background-image: url(images/dash.jpg);">
					<div class="wrap-content-slide1 size24 flex-col-c-m p-l-15 p-r-15 p-t-120 p-b-170">
						<h2 class="caption1-slide1 xl-text3 t-center bo15 p-b-3 animated visible-false m-b-25" data-appear="rotateInDownLeft">
							 Welcome in our Dashboard
						</h2>
					</div>
				</div>

				
			</div>
		</div>
	</section>
@endsection