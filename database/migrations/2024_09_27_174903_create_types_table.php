<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id(); 
            $table->enum('name', ['Hot', 'Hot On Social', 'Normal'])->unique(); 
            $table->timestamps(); 
        });

        
    }

    public function down()
    {
        Schema::dropIfExists('types');
    }
}

