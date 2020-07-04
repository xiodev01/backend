<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWelcomepagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcomepages', function (Blueprint $table) {
            $table->id();
            $table->text('Whoarewe')->nullable();
            $table->text('Imports')->nullable();
            $table->text('Exports')->nullable();
            $table->text('Image')->nullable();
            $table->text('DescribeProduct')->nullable();
            $table->text('DescribeServices')->nullable();
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
        Schema::dropIfExists('welcomepages');
    }
}
