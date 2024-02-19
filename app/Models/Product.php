<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['brand_id', 'images', 'name', 'slug', 'sex', 'metadata', 'description', 'prices', 'trending', 'view', 'status', 'created_at', 'updated_at'];
}
