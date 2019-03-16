@extends('layouts.adminlayout')
@section('title') @stop
@section('content')
<div class="container" style="margin-top: 10%;">
    <h1 class="text-center" style="margin-bottom: 2%; padding: -10px;"> Edit Your Profile</h1>
    <div class="row">   
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="jumbotron" style=" background: -webkit-gradient(white,white);">
          <form method="POST" action="{!!url('/adminupdateprofile', Auth::user()->id)!!}" enctype="multipart/form-data">
          @csrf
          {!!method_field('put')!!}
            <input type="hidden" name="size" value="1000000">

            <div class="form-group">
              <label for="name"><i class="fa fa-user"></i>Full name :</label>
              <input type="text" name="name" class="form-control" value="{!!(Auth::user()->name)!!}" required>
            </div>
       <div class="form-group">
              <label for="name"><i class="fa fa-address-card"></i> Address :</label>
              <input type="text" name="address" class="form-control" value="{!!(Auth::user()->address)!!}"required>
            </div>
            <div class="form-group">
              <label for="name"><i class="fa fa-phone"></i>Phone no :</label>
              <input type="text" name="phone_no" class="form-control" value="{!!(Auth::user()->phone_no)!!}"required>
            </div>
            <div class="form-group">
              <label class="col-sm-3">Gender: </label>
              <label class="radio-inline">
              <input type="radio" name="sex" value="Female" @if(Auth::user()->gender == 'Female') checked="checked" @endif>Female
            </label> &nbsp 
            &nbsp  &nbsp  &nbsp 
            <label class="radio-inline">
             <input type="radio" name="sex" value="Male" @if(Auth::user()->gender == 'Male') checked="checked" @endif>Male
            </label>
            &nbsp 
            &nbsp  &nbsp  &nbsp 
            <label class="radio-inline">
            <input type="radio" name="sex" value="Others" @if(Auth::user()->gender == 'Others') checked="checked" @endif>Others
            </label>
            </div>
         
            <div class="form-group">
              <label for="dob"><i class="fa fa-calendar"></i>Date Of Birth</label>
              <input type="date" name="date_of_birth" class="form-control"  value="{!!(Auth::user()->date_of_birth)!!}" required>
            </div>

       <div class="form-group">
              <label for="name"><i class="fa fa-envelope-square"></i> Email :</label>
              <input type="text" name="email" class="form-control" value="{!!(Auth::user()->email)!!}"required>
            </div>
    <div class="row">
          <div class="col-md-6">
      <input type="submit" name="update" class="btn btn-info form-control" value="Update">
          </div>
        </div>
  </form>
        </div>
      </div>
    </div>
    </div>

@endsection

<script>
      var msg = '{{Session::get('success')}}';
      var exist = '{{Session::has('success')}}';
      if(exist)
      {
        alert(msg);
      }
</script>
