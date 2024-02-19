<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;
    protected $table = 'order_list';
    protected $fillable = ['customer_id', 'username', 'email', 'address', 'phone', 'note', 
    'total', 'payment_value', 'payment_status', 'order_value', 'order_status', 'status', 'created_at', 'updated_at'];
}
