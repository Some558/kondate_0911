<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDishes extends Model
{
    protected $table = 'user_dishes';
    protected $primaryKey = 'user_menu_id';
    public $incrementing = true;
}
