<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;
class InvoiceTotal extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_sub_total',
        'invoice_tax',
        'invoice_grand_total',
        'invoice_id'
    ];
    public function invoices()
    {
        return $this->belongsTo(Invoice::class);
    }
}
