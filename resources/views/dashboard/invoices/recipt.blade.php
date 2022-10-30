<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="{{ asset('assets/css/reciptstyle.css') }}" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body style="width:70%;margin-left:15%;">
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('assets/media/photos/image.jpg') }}">
      </div>
      <h1>INVOICE 150822-13</h1>
      <div id="company" class="clearfix">
        <div>Log Apps</div>
        <div>453 Haram street,<br /> Nasr-Eldin, Egypt</div>
        <div>(+2) 01066055217</div>
        <div><a href="mailto:company@example.com">bills@log-apps.com</a></div>
      </div>
      <div id="project">
        <div><span>CLIENT</span> {{ $customer_data['name'] }}</div>
        <div><span>EMAIL</span> <a href="mailto:{{ $customer_data['email'] }}">{{ $customer_data['email'] }}</a></div>
        <div><span>Phone</span> {{ $customer_data['phone'] }} </div>
        <div><span>ADDRESS</span>  {{ $customer_data['address'] }}</div>
        <div><span>DATE</span> {{ $invoice_date }}</div>
        <!--<div><span>DUE DATE</span> September 17, 2015</div>-->
      </div>
    </header>
    <main>
    <table id="table" class="table table-striped table-sm">
        <thead>
            <tr>
                <td class="text-center">No.</td>
                <td class="text-center">Service Name</td>
                <td class="text-center">Description</td>
                <td class="text-center">Price</td>
                <td class="text-center">Quantity</td>
                <td class="text-center">Subtotal</td>
            </tr>
        </thead>
        <tbody id="table-body">
            @foreach($row as $key => $value)

            <tr>
                <td class="text-center">{{ $value['row_num'] }}</td>
                <td class="text-center">{{ $value['name'] }}</td>
                <td class="text-center">{{ $value['description'] }}</td>
                <td class="text-center">{{ $value['price'] ." $ => ". $value['price']*$invoice_dollar_price . " LE" }}</td>
                <td class="text-center">{{ $value['row_quantity'] }}</td>
                <td class="text-center">{{ $value['row_sub_total'] ." $ => ". $value['row_sub_total']*$invoice_dollar_price . " LE" }}</td>
            </tr>
            @endforeach

        </tbody>
        <tfoot class="text-center">
            <tr>
                <td class="text-center" colspan="5">All SubTotal</td>
                <td class="text-center bg-primary text-light">{{ $invoice_totals['invoice_sub_total'] ." $ => ". $invoice_totals['invoice_sub_total']*$invoice_dollar_price . " LE" }}</td>
            </tr>
            <tr>
                <td class="text-center" colspan="5">Tax</td>
                <td class="text-center bg-info text-light">{{ $invoice_totals['invoice_tax'] ." $ => ". $invoice_totals['invoice_tax']*$invoice_dollar_price . " LE" }}</td>
            </tr>
            <tr>
                <td class="text-center" colspan="5">Grand Total</td>
                <td class="text-center bg-primary text-light">{{ $invoice_totals['invoice_grand_total'] ." $ => ". $invoice_totals['invoice_grand_total']*$invoice_dollar_price . " LE" }}</td>
            </tr>
        </tfoot>
    </table>
    <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">The current value according to the exchange rate is {{ $invoice_totals['invoice_grand_total']*$invoice_dollar_price }} Egyptian pounds</div>
        <li style="
    padding-top: 15px;
">This hosting  invoice is paid {{ $invoice_date }}</li>
        <!--<li style="padding-top: 15px;">Dear customer, you can take advantage of the old price system if you pay the annual bill before 09/08/2022 and get a discount of 421.80 pounds</li>-->
        <li style="padding-top: 15px; font-size: 16px; background: limegreen">Dear customer, you have been granted a free subscription to SSL certificates for one year, worth 422 pounds.</li>
      </div>
    </main>
    <!--<footer>-->
      <!--This invoice is unpaid and submitted with the contract form-->
    <!--</footer>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</body>
</html>
