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
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('post_id'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        });
    
        Schema::table('reply_comments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('comment_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    
        Schema::table('reply_comments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
