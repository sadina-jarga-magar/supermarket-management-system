@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 10%;">
    <h1 class="text-center" style="margin-bottom: 2%; padding: -10px;"> Registration Form</h1>
    <div class="row">   
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="jumbotron" style=" background: -webkit-gradient(white,white);">
          <form method="POST"  action="{{ route('register') }}" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
{{ csrf_field() }}
            <div class="form-group">
              <label for="name"><i class="fa fa-user"></i>{{ __(' Full Name') }}</label>
              <input id="name" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus>
              @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
            </div>

			 <div class="form-group">
              <label for="address"><i class="fa fa-address-card"></i>{{ __(' Address') }}</label>
              <input id="address" type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}" required autofocus>
              @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
            </div>

            <div class="form-group">
              <label for="phone_no "><i class="fa fa-phone"></i>{{ __('phone_no') }}</label>
              <input id="phone_no" type="text" name="phone_no" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" value="{{ old('phone_no') }}" required autofocus>
              @if ($errors->has('phone_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
            </div>

            <div class="form-group">
              <label class="col-sm-3">Gender: </label>
              <div class="col-sm-12">
              <label class="radio-inline">
              <input type="radio" name="sex" value="Female" checked>Female
            </label> &nbsp 
            &nbsp  &nbsp  &nbsp 
            <label class="radio-inline">
             <input type="radio" name="sex" value="Male">Male
            </label>
            &nbsp 
            &nbsp  &nbsp  &nbsp 
            <label class="radio-inline">
            <input type="radio" name="sex" value="Others">Others
            </label>

                  @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
              </div>
            </div>

            
			 <div class="form-group">
              <label for="dob"><i class="fa fa-calendar"></i>Date Of Birth</label>
              <input type="date" name="date_of_birth" class="form-control"  required>
            </div>

			 <div class="form-group">
              <label for="email"><i class="fa fa-envelope-square"></i>{{ __('E-Mail Address') }}</label>
              <input id="email" type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
              @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            </div>

			 <div class="form-group">
              <label for="password"><i class="fa fa-lock"></i>{{ __('Password') }}</label>
              <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
              @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            </div>

			 <div class="form-group">
              <label for="password-confirm"><i class="fa fa-lock"></i>{{ __('Confirm Password') }}</label>
              <input id="password-confirm" type="password" name="password_confirmation" class="form-control" required>
            </div>



		<div class="row">
          <div class="col-md-3" style="margin-left:180px;">
			<input type="submit" name="signup" class="btn btn-info form-control" value="Signup">
          </div>
        </div>
	</form>
        </div>
      </div>
	  </div>
	  </div>
@endsection
