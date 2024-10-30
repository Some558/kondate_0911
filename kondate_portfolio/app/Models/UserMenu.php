<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model
{
    use HasFactory;

    // UserMenu.php
    public function mainDish()
    {
        return $this->belongsTo(UserDishes::class, 'main_dish_id');
    }

    public function subDish()
    {
        return $this->belongsTo(UserDishes::class, 'sub_dish_id');
    }

    public function subDish2()
    {
        return $this->belongsTo(UserDishes::class, 'sub_dish2_id');
    }
}
