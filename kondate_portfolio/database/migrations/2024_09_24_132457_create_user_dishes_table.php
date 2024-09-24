<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_dishes', function (Blueprint $table) {
            $table->bigIncrements('user_menu_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('menu_option_id')->constrained('menu__options')->onDelete('cascade'); // menu__optionsのidを外部キーとして設定
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_dishes');
    }
};