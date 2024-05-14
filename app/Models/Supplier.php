<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $primaryKey = 'supplier_id';
    protected $fillable = [
        'supplier_name',
        'contact_name',
        'address',
        'postal_code',
        'country',
        'contact_number'
    ];
}
