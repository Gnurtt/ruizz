<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'color_id', 'prices', 'total_price', 'status', 'created_at', 'updated_at'];
}
