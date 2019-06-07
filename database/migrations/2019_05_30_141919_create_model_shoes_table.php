<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelShoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_shoes', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('id_category');
            $table->foreign('id_category')->references('id')->on('categories');
            $table->unsignedInteger('id_brand');
            $table->foreign('id_brand')->references('id')->on('brands');
            $table->string('model',20);
            $table->string('photo');
            $table->string('qr_code')->nullable();
            $table->decimal('ref_price',8,2);
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
        Schema::dropIfExists('model_shoes');
    }
}
