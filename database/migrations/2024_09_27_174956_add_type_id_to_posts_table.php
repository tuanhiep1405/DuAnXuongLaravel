<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeIdToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id'); // Thêm cột type_id

            // Thiết lập khóa ngoại
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['type_id']); // Xóa khóa ngoại
            $table->dropColumn('type_id'); // Xóa cột type_id
        });
    }
}

