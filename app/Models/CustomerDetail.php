<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    use HasFactory;
    protected $table = 'customer_detail';
    protected $fillable = ['customer_auth_id', 'username', 'avatar', 'telephone', 'address', 'identity', 'status', 'created_at', 'updated_at'];
}
