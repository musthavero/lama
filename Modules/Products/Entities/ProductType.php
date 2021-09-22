<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Products\Database\factories\ProductTypeFactory;

class ProductType extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return ProductTypeFactory::new();
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'type_id');
    }
}
