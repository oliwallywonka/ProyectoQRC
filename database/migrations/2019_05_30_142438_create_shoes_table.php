<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoes', function (Blueprint $table) {
            $table->Increments('id');
            
            $table->unsignedInteger('id_size');
            $table->foreign('id_size')->references('id')->on('sizes');
            $table->unsignedInteger('id_color');
            $table->foreign('id_color')->references('id')->on('colors');
            $table->decimal('ref_price',8,2);
            $table->string('description')->nullable();
            $table->string('photo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoes');
    }
}
