<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvoiceRow;
class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'price',
        'displayed'
    ];
    public function invoice_rows()
    {
        return $this->belongsToMany(InvoiceRow::class, 'row_services');
    }
}
