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
        if (!Schema::hasTable('user_menus')) {
        Schema::create('user_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('day_of_week', ['Mon', 'Tues', 'Wednes', 'Thurs', 'Fri', 'Satur', 'Sun'])->comment('曜日');
            $table->foreignId('main_dish_id')->constrained('user_dishes')->onDelete('cascade');
            $table->foreignId('sub_dish1_id')->constrained('user_dishes')->onDelete('cascade');
            $table->foreignId('sub_dish2_id')->constrained('user_dishes')->onDelete('cascade');
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_menus');
    }
};
