<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('menu__options', function (Blueprint $table) {
            $table->enum('dish_type', ['main', 'sub'])->change();
        });
    }

    public function down()
    {
        Schema::table('menu__options', function (Blueprint $table) {
            $table->enum('dish_type', ['main', 'sub1', 'sub2'])->change();
        });
    }
};
