@include('layouts.header2')
<div class="container">

    <div class="billTop mt-2">
            <button type="button" id="btnPrint" value="Print" onClick="printReport()" class="ttt btn btn-primary mb-2">Print Bill</button>
    </div>
<div class="container col-md-8 mt-5 pt-5 bg-light" id="printableArea">
<div class="billingHead">
        <h3 class="text-center font-weight-bold mb-5">LittleMart

        </h3>
    <div class="row">
    <p class="text-left col-md-6"><label>Bill No. {{$bill->O_id}}</label>


    </p>

    <p class="text-right col-md-6">Date:  <label><?php
        echo date('Y-m-d');
        ?></label></p>
    </div>
    <div class="customer text-left">
    <p>Customer Name: {{Auth::user()->name}}</p>
    <p>Customer Address: {{Auth::user()->address}}</p>

    </div>
    <table class="table table-bordered" border="1">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Item</th>
                    <th>Item Price</th>
                    <th>Item Quantity</th>
                    <th>Amount</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($billProduct as $key => $data)
                    <tr class="trItems">
                        <td>{{$key + 1}}</td>
                        <td>{{$data->P_name}}</td>
                        <td class="Price">{{$data->Rate}}</td>
                        <td class="Qty">{{$data->quantity}}</td>
                        <td class="Amt"></td>
                    </tr>
                    @endforeach
                </tbody>
        </table>

        <script src="{{asset('js/app.js')}}"></script>
        <script>
            $(document).ready(function(){
                  $('.trItems').each(function(){
                    var q = $(this).closest('tr').find('.Qty').text();
                            var p = $(this).closest('tr').find('.Price').text();
                            var tot = p*q;

                            $(this).closest('tr').find('.Amt').text(tot);
                });


                var Prices = $('.Amt');
                            var total = 0;
                            var Gtotal = 0;
                             $.each(Prices, function(i, Price){
                              var pc=$(this).text();
                              if (pc!= 'NA'){
                                   total = total + parseInt(pc,10);
                                //    Gtotal = total + 100;
                              }});
                            // $('#subTot').text(total);
                            // $('#gTot').text(Gtotal);





                var subTot = total;
                $("#subTot").text(subTot);


                $("#gTot").text(subTot+100);


                $('#dis').keyup(function(){
                    var disPer = $(this).val();
                    var disAmt = (subTot/100)*disPer;
                    var roundedDis = Math.round(disAmt);
                    $("#gTot").text(subTot-roundedDis+100);
                });

                $('#dis').change(function(){
                    var disPer = $(this).val();
                    var disAmt = (subTot/100)*disPer;
                    var roundedDis = Math.round(disAmt);
                    $("#gTot").text(subTot-roundedDis+100);
                });
            });

        </script>
</div>  
<div class="billingBody">
<div class="Total text-right">

 Sub Total : <label  id="subTot"></label> <br>

 Shipping Charge : <label> 100 </label> <br>
 Discount :&nbsp <input  id="dis" type="number" min="0" max="100"> % <br>
G.Total : <b><label  id="gTot"></label></b>
</div>
<p class="col text-center">Thank you for your visit we hope you liked our service.</p>
<p>LittleMart</p>
<p>Putali line street, Dharan</p>
<p>9803933811</p>
</div>
</div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    function printReport()
    {
        document.getElementById('btnPrint').style.visibility = 'hidden';
        var prtContent = document.getElementById("printableArea");
        window.print(prtContent);
        document.getElementById('btnPrint').style.visibility = 'visible';
    }
</script>

<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="vendor/select2/select2.min.js"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/slick-custom.js"></script>
    <script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
    <script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
    <script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
    <script src="js/main.js"></script>
