<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('companyName')->nullable();
            $table->text('companyLogo')->nullable();
            $table->text('companyEmail')->nullable();
            $table->text('companyPhone')->nullable();
            $table->text('companyAddress')->nullable();
            $table->text('companyWorkingTime')->nullable();
            $table->text('Email')->nullable();
            $table->text('Password')->nullable();
            $table->text('FacebookLink')->nullable();
            $table->text('InstagramLink')->nullable();
            $table->text('GoogleLink')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
