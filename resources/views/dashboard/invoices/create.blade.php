@extends('layouts.master')
@section('content')
{{-- invoice_id --}}

{{-- invoice_dollar_price done--}}
{{-- invoice_customer_id <= invoice_customer_name done--}}
{{-- invoice_date done--}}
{{-- Table --}}
{{-- row_num <= No.--}}
{{-- service_id <= Service Name--}}
{{-- row_quantity <= Quantity--}}
{{-- row_sub_total <= Row Sub Total--}}

{{-- invoice_sub_total --}}
{{-- invoice_tax done--}}
{{-- invoice_grand_total --}}

<form action="" method="post">
    @csrf
    <div class="container-a">
        <div class="grid-container">
            <div class="grid-item dollar">
                <label for="">Dollar Price Today</label>
                <input type="number" id="dollarprice" name="invoice_dollar_price">
            </div>
            <div class="grid-item customer">
                <label for="customer_name">Select Customer Name</label>
                <input type="text" class="" id="customer_name" name="invoice_customer_name" placeholder="enter customer name">
                <div id="customerList"></div>
                {{ csrf_field() }}
            </div>
            <div class="grid-item date">
                {{-- <label for="example-flatpickr-default">Date</label> --}}
                <input type="date" id="date" name="invoice_date" value="" class="p-1 datadate" >
            </div>
        </div>
        </div>

    <div class="container-b">
        <form action="" method="post">
        <div class="row d-flex">
            <div class="col-3">
                <label for="selectservice">Select Service</label>
                <select class="form-control d-block" id="selectservice" name="service_name">
                    <option selected disabled>Please select</option>
                    @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" value="40 $ => 788 L.E" id="desc" disabled class="bg-light d-block">
            <div class="col-3 justify-content-center">
                <label for="a">Price</label>
                <input type="text" value="40" id="price" disabled class="bg-light d-block">
            </div>
            <div class="col-2">
                <label for="b">Quantity</label>
                <input type="number" value="" id="quantity" class="d-block">
            </div>
            <input type="hidden" value="40" id="sub_total" disabled class="bg-light d-block">
            <div class="col-2">
                <button type="button" id="add-row" class="btn btn-success text-light font-weight-bold ml-7 mt-4 mb-2" >Add</button>
            </div>
        </div>
        </form>
        </div>

    <div class="container-c">
        <a href="{{ route('print') }}" class="print" title='press "F11"'> <i class="fa fa-print fa-lg text-danger" aria-hidden="true"></i><span>Print</span></a>
        <a href="" class="save" title='press "F1"'><i class="fa fa-save text-primary" style="font-size:24px"></i><span>Save</span></a>

        </div>

    <div class="container-d">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full text-center">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell" style="width: 5%;">No.</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Service Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Description</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Price $</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Quantity</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Sub Total</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;" colspan="2">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                        </tr>
                    </tbody>
                    {{-- <tfoot>
                        <tr class="border border-dark bg-light">
                            <td colspan="5"><span class="text-center font-weight-bold text-dark">SubTotal</span></td>
                            <td colspan="1" id="all" class="text-dark font-weight-bold"></td>
                            <td colspan="1" class=""></td>
                            <td colspan="1" class=""></td>
                        </tr>
                        <tr class="border border-dark bg-light">
                            <td colspan="5"><span class="text-center font-weight-bold text-dark">Tax</span></td>
                            <td colspan="1" class=""><input type="number" name="invoice_tax" id="" placeholder="value like 5 $"></td>
                            <td colspan="1" class=""></td>
                            <td colspan="1" class=""></td>
                        </tr>
                        <tr class="border border-dark bg-light">
                            <td colspan="5"><span class="text-center font-weight-bold text-dark">GrandTotal</span></td>
                            <td colspan="1" id="all" class="text-dark font-weight-bold"></td>
                            <td colspan="1" class=""></td>
                            <td colspan="1" class=""></td>
                        </tr>
                    </tfoot> --}}
                    <tfoot></tfoot>
                </table>
        </div>
</form>
<script>
    const date = new Date();
    const Year = date.getFullYear();
    // console.log(Year);
    const Month = date.getMonth()+1;
    // console.log(Month);
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
        ];
    const month_name = monthNames[date.getMonth()];
    // console.log(month_name);
    const Day = date.getDate();
    // console.log(Day);
    let daysArray = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const nameDay = daysArray[date.getDay()];
    // console.log(nameDay);
    const textDateCurrent = Day+' - '+Month+' - '+Year+' ('+nameDay+')';
    window.onload = () => {
        document.getElementById('date').innerText=textDateCurrent;
    };
    $(document).ready(function(){
        $('#customer_name').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('customers.fetch') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                    $('#customerList').fadeIn();
                        $('#customerList').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'li', function(){
            $('#customer_name').val($(this).text());
            $('#customerList').fadeOut();
        });

        $('#selectservice').on('change', function () {
            var idSelected = this.value;
            // $('#result').html(idSelected);
            $('#result').html('<h3>'+idSelected+'</h3>');
            $.ajax({
                url: "{{url('api/invoices/fetchservices')}}",
                type: "POST",
                data: {
                    selected_id: idSelected,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result, status) {

                    // console.log(result.price);
                    // $('#price').text(result.price);
                   $('#price').val(result.price);
                }

            });

        });
        // $('#add-row').on('click',function () {

        // });;
    });

    </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            // Add new row
            var total=0;
            counter=0;
            // $("#add-row").on('click',()=>{




            // });
            $("#add-row").click(()=>{
                var idSelected = document.querySelector('#selectservice').value;

                $.ajax({
                    url: "{{url('api/invoices/fetchservices')}}",
                    type: "POST",
                    data: {
                        selected_id: idSelected,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success:(result, status)=>{
                        var selectservice = $("#selectservice").val();//
                        var desc = 'description';//
                        var price = $("#price").val();//
                        var dollarprice = $("#dollarprice").val();
                        var priceconverted = price + ' $ => ' + price*dollarprice + ' LE';
                        var quantity = $("#quantity").val();
                        var sub_total = price*quantity;
                        var sub_total_converted=price*quantity + ' $ => ' + price*dollarprice*quantity + ' LE';
                        total+=sub_total;

                        var allHidden = document.querySelectorAll('.table tbody tr .result_id');
                        let isFound = false;
                        allHidden.forEach((element) => {
                            if(selectservice==element.value) {
                                isFound = true;
                            }
                        });
                        if(isFound) {
                            return;
                        }
                        counter+=1;
                        $(".table tbody tr").last().after(
                            `<tr class="fadetext">
                                <td data-set="${counter}">${counter}</td>
                                <td data-set="${result.id}"><input type="hidden" value="${result.id}" disabled class="bg-light d-block result_id">
                                    ${result.name}</td>
                                <td>${result.desc}</td>
                                <td>${priceconverted}</td>
                                <td data-set="${quantity}">${quantity}</td>
                                <td data-set="${sub_total}">${sub_total_converted}</td>
                                <td><a href="# id="remove-row"><i class="fa fa-edit text-primary">edit</i></a></td>
                                <td><a href="#" id="remove-row"><i class="fa fa-trash text-danger">delete</i></a></td>
                            </tr>`
                        );
                        // $(".table").find('tfoot').append(
                        //     `<tr class="fadetext">
                        //         <td colspan="5">All SubTotal</td>
                        //         <td data-set="${total}"><span id="subtotal">${total} $ => ${(total-50)*dollarprice} LE</span></td>
                        //         <td colspan="2"></td>
                        //     </tr>
                        //     <tr class="fadetext">
                        //         <td colspan="5">Tax</td>
                        //         <td><input type="number" name="" id="" class="text-center" value="50" placeholder="enter value like 5 $"></td>
                        //         <td colspan="2"></td>
                        //     </tr>
                        //     <tr class="fadetext">
                        //         <td id="" class="" colspan="5" data-set="400">Grand Total</td>
                        //         <td id="" class="" data-set="${total-50}"><span id="grandtotal">${total-50} $ => ${(total-50)*dollarprice} LE</span></td>
                        //         <td id="" class="" colspan="2"></td>
                        //     </tr>`
                        // );

                    }
                    //    for (const result_value in result) {
                    //     console.log(result_value+" => "+result[result_value]);
                    //     result[result_value] = result[result_value];

                    //    }

                })




            })
            // Select all checkbox
            $("#select-all").click(function(){
                var isSelected = $(this).is(":checked");
                if(isSelected){
                    $(".table tbody tr").each(function(){
                        $(this).find('input[type="checkbox"]').prop('checked', true);
                    })
                }else{
                    $(".table tbody tr").each(function(){
                        $(this).find('input[type="checkbox"]').prop('checked', false);
                    })
                }
            });

        })
    </script>
@endsection
