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
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->enum('status', ['pending', 'processing', 'shipped', 'completed', 'cancelled'])
                  ->default('pending')
                  ->change();
        });
    }

    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->enum('status', ['pending', 'completed', 'abandoned'])
                  ->default('pending')
                  ->change();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0)->change(); // Hoặc giá trị cũ
        });
    }
};
