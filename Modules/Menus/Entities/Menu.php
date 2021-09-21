<?php

namespace Modules\Menus\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected static function booted()
    {
        static::deleting(function ($menu) {
            $menu->menu_items()->delete();
        });
    }

    public function menu_items()
    {
        return $this->hasMany(MenuItem::class);
    }

}
