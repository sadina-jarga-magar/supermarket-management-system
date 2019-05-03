@extends('layouts.adminlayout')
@section('title') @stop
@section('content')
<div class="container" style="margin-left:10%;">
      <div class="container" style="margin-left:14%;">
        <h2 style="margin-right:40%;"><u>List of customer orders</u></h2>
<div class="row" >

</div>
        <table  id="myTable" class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Shipping Address</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
           
                @foreach($showOrders as $key => $data)
                    <tr>
                    <td>{{$key + 1}}</td>
                        <td>{!! ($data->name) !!}</td>
                         <td>{!! ($data->shippingAddress) !!}</td>
                          <td>{!! ($data->contactNo) !!}</td>
                           <td>{!! ($data->email) !!}</td>
                        <td>
                            <form action="{{url('/usersBill')}}" method="POST">
                            {{ csrf_field() }} 
                                {!! method_field('GET') !!}
                                
                                <input type="hidden" name="oId" value="{{$data->O_id}}">
                                <button type="submit" name="genBill" class="btn btn-primary btn-sm"> Generate Bill</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

                        </div>


                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
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


