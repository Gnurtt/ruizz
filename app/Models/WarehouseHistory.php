<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseHistory extends Model
{
    use HasFactory;
    protected $table = 'warehouse_history';
    protected $fillable = ['admin_id', 'history_status', 'status', 'created_at', 'updated_at'];
}
