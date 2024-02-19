<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseHistoryDetail extends Model
{
    use HasFactory;
    protected $table = 'warehouse_history_detail';
    protected $fillable = ['warehouse_history_id', 'product_id', 'quantity', 'prices', 'status', 'created_at', 'updated_at'];
}
