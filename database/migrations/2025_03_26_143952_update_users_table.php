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
        Schema::table('users', function (Blueprint $table) {
            // Thêm các cột còn thiếu
            $table->string('phone', 20)->nullable()->after('password');
            $table->text('address')->nullable()->after('phone');
            $table->string('avatar', 255)->nullable()->after('address');

            // Thêm role_id với khóa ngoại tới bảng roles
            $table->foreignId('role_id')
                  ->nullable() // Tùy bảnh muốn bắt buộc hay không
                  ->after('avatar')
                  ->constrained('roles')
                  ->onDelete('cascade');

            // Trạng thái user
            $table->tinyInteger('status')->default(1)->after('role_id');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Xóa các cột vừa thêm
            $table->dropForeign(['role_id']);
            $table->dropColumn(['phone', 'address', 'avatar', 'role_id', 'status']);
        });
    }
};
