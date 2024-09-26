<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameMenuOptionIdInUserDishesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_dishes', function (Blueprint $table) {
            $table->renameColumn('menu__option_id', 'menu_option_id'); // カラム名を変更
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_dishes', function (Blueprint $table) {
            $table->renameColumn('menu_option_id', 'menu__option_id'); // 元に戻す
        });
    }
}
