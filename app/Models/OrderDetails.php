<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    public $table = 'order_details';

    protected $fillable = [
        'orderID',
        'productID',
        'color',
        'size',
        'quantity',
        
    ];
    public $timestamps = false;
}
