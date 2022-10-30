<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;
use App\Models\Service;
class InvoiceRow extends Model
{
    use HasFactory;
    protected $fillable = [
        'row_num',
        'row_quantity',
        'invoice_id'
    ];
    public function invoices()
    {
        return $this->belongsTo(Invoice::class);
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'row_services');
    }
}
