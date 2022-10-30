<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class RowService extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_row_id',
        'service_id',
        'row_sub_total'
    ];

}
