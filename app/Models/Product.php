<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_image',
        'product_name',
        'supplier_id',
        'category_id',
        'brand_id',
        'barcode',
        'unit_price',
        'unit_in_stock'
    ];
}
