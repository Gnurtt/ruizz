<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAuth extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $fillable = ['secret_key', 'email', 'password', 'verify_code', 'status', 'created_at', 'updated_at'];
}
