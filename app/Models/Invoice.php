<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\InvoiceRow;
use App\Models\InvoiceTotal;
class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_dollar_price',
        'invoice_date',
        'customer_id'
    ];
    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
    public function invoice_totals()
    {
        return $this->hasOne(InvoiceTotal::class);
    }
    public function invoice_rows()
    {
        return $this->hasMany(InvoiceRow::class);
    }
}
