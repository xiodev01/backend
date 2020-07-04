<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->text('img');
            // MySQL FORIGNKEY
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('Products')->onDelete('cascade');

            // pgSQL FORIGNKEY
            // $table->unsignedBigInteger('product_id');
            // $table->foreign('product_id')->references('Products')->on('id'); 


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
        Schema::dropIfExists('images');
    }
}
