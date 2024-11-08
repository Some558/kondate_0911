<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDishes extends Model
{
    use HasFactory; // 追加: ファクトリを使用する場合

    protected $table = 'user_dishes';
    protected $primaryKey = 'user_menu_id'; // 主キーを 'user_menu_id' に設定
    public $incrementing = true;
    protected $fillable = ['user_id', 'menu_option_id'];

    // リレーションの定義
    public function menuOption()
    {
        return $this->belongsTo(MenuOptions::class, 'menu_option_id');
    }
}
