@extends('layouts.app')
@section('title') @stop
@section('content')
	<!-- Title Page -->
	<section class="bg-title-page p-t-90 flex-col-c-m" style="background-image: url(images/orange.jpg);">
		<h2 class="l-text2 t-center">
			Contact
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
			
				<div class="col-md-6 p-b-30">
						<h4 class="m-text26 p-b-36 p-t-15">
							Contact Form
						</h4>
						<form method="POST" action="{!! url('/contactinfo') !!}" enctype="multipart/form-data">
						@csrf

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="f_name" placeholder="first Name">
						</div>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="L_name" placeholder="Last Name">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phn_no" placeholder="Phone Number">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Address">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<input type="submit" name="send" class="btn btn-success form-control" value="Send"><br><br>
						</div>
					</form>
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