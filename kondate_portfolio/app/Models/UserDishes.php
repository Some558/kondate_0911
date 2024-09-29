<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDishes extends Model
{
    use HasFactory; // 追加: ファクトリを使用する場合

    protected $table = 'user_dishes';
    protected $primaryKey = 'user_menu_id';
    public $incrementing = true;

    // リレーションの定義
    public function menuOption()
    {
        return $this->belongsTo(MenuOptions::class, 'menu_option_id');
    }
}
