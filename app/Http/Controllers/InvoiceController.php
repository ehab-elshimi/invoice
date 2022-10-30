<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceRow;
use App\Models\InvoiceTotal;
use App\Models\RowService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.invoices.index');
    }

    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = Customer::where('name', 'LIKE', "%{$query}%")->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative;width:100%;">';
            foreach($data as $row)
            {
                $output .= '<li><a class="dropdown-item" href="#">'.$row->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view('dashboard.invoices.create',compact('services'));
    }
    public function fetchServices(Request $request){
        if($request->get('selected_id'))
        {
            $id = $request->get('selected_id');
            $service = Service::where('id',$id)->first();
            return $service;
        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function save_invoice(){

    }
    public function print(){
        $id=1;
        $primary_data=Invoice::where('id',$id)->first();
        $invoice_dollar_price =$primary_data['invoice_dollar_price'];
        $invoice_date=$primary_data['invoice_date'];
        $customer_data=Customer::where('id',$primary_data['customer_id'])->first();
        $invoice_totals = InvoiceTotal::where('invoice_id',$id)->first();
        global $row;
        $row =array();
        $invoice_row=InvoiceRow::where('invoice_id',$id)->get();
        $invoice_row_num=$invoice_row->pluck('row_num');
        $invoice_row_quantity=$invoice_row->pluck('row_quantity');
        // $row_num=$invoice_row_data['1'];
        // $row_quantity = $invoice_row_data['0'];
        // echo $row_num;
        // echo $row_quantity;
        // array_push($z,$row_num,$row_quantity);
        $data_selected=InvoiceRow::where('invoice_id',$id)->get();
        $row_id=$data_selected->pluck('id');
        $invoice=RowService::where(function() use ($row_id){
            foreach($row_id as $value){
                $service_id=RowService::where('invoice_row_id',$value)->first();
                $service=Service::where('id',$value)->first();
                $data_row=InvoiceRow::where('id',$value)->first();
                $data_row_service=RowService::where('invoice_row_id',$value)->first();
                global $row;
                $row_value=array(
                    'row_num'=>$data_row['row_num'],
                    'name'=>$service['name'],
                    'description'=>$service['desc'],
                    'price'=>$service['price'],
                    'row_quantity'=>$data_row['row_quantity'],
                    'row_sub_total'=>$data_row_service['row_sub_total']
                );
                array_push($row,$row_value);
            }
        })->get();
        return view('dashboard.invoices.recipt',compact('invoice_dollar_price','invoice_date','customer_data','invoice_totals','row'));

    }
    public function original_print(){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.invoices.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
