@extends('layouts.adminlayout')
@section('title') @stop
@section('content')
<div class="container" style="margin-left:10%;">
      <div class="container" style="margin-left:14%;">
        <h2 style="margin-right:40%;"><u>List of registered user</u></h2>
<div class="row" >
<div class="col-md-4">
<input  class="s-text7 size6 p-l-23 p-r-50"  type="text" id="myInput" onkeyup="myFunction()" placeholder="Search register user..."
style="background: #f5f7f5;; color: rgb(61, 38, 38);margin-left:180%;">
</div>
</div>
        <table  id="myTable" class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Posted date</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
           
                @foreach($reguser as $regusers)
                    <tr>
                    <td>{{$regusers->id}}</td>
                        <td>{!! ($regusers->name) !!}</td>
                         <td>{!! ($regusers->address) !!}</td>
                          <td>{!! ($regusers->phone_no) !!}</td>
                           <td>{!! ($regusers->email) !!}</td>
                        <td>{!! $regusers->created_at !!}</td>
                        <td>
                            <form action="#" method="POST">
                            {{ csrf_field() }} 
                                {!! method_field('DELETE') !!}
                                
                              
                                <button type="submit"name="delete" onclick="if (!confirm('Are you sure to delete this medicine?')) { return false }" class="btn btn-danger btn-sm"> Delete</button>
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
  <script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

