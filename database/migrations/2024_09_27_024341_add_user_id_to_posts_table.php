<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Thêm cột user_id và đặt nó là khóa ngoại
            $table->unsignedBigInteger('user_id')->after('id'); // Thêm cột user_id sau cột id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // Xóa cột author nếu không còn cần thiết
            $table->dropColumn('author');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Xóa khóa ngoại và cột user_id
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            // Thêm lại cột author nếu cần
            $table->string('author')->nullable();
        });
    }
}
