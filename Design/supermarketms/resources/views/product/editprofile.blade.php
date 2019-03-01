@extends('layouts.app')
@section('title') @stop
@section('content')
<div class="container" style="margin-top: 10%;">
    <h1 class="text-center" style="margin-bottom: 2%; padding: -10px;"> Edit Your Profile</h1>
    <div class="row">   
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="jumbotron" style=" background: -webkit-gradient(white,white);">
          <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">

            <div class="form-group">
              <label for="name"><i class=""></i> Full name :</label>
              <input type="text" name="name" class="form-control" required>
            </div>
			 <div class="form-group">
              <label for="name"><i class=""></i> Address :</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="name"><i class=""></i>Phone no :</label>
              <input type="text" name="name" class="form-control" required>
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
            </div>
            </div>


			 <div class="form-group">
              <label for="name"><i class=""></i> Email :</label>
              <input type="text" name="name" class="form-control" required>
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