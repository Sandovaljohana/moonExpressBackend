<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderProduct extends Model
{
    use HasFactory;

    protected $fillable = ['provider_id', 'product_id'];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}