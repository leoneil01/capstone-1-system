<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $primaryKey = 'item_id';
    protected $fillable = [
        'product_name',
        'qty',
        'unit_price',
        'transaction_id'
    ];
}
