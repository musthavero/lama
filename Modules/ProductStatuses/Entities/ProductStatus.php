<?php

namespace Modules\ProductStatuses\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Products\Entities\Product;

class ProductStatus extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Products\Database\factories\ProductStatusFactory::new();
    }
    public function products() {
        return $this->hasMany(Product::class,'id');
    }
}
