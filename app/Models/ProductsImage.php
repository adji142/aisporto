<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductsImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'image'];

    public function portfolio()
    {
        return $this->belongsTo(Product::class);
    }
}
