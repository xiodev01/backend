<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutpages', function (Blueprint $table) {
            $table->id();
            $table->text('CompanyDescription')->nullable();
            $table->text('CompanyImage')->nullable();
            $table->text('Mession')->nullable();
            $table->text('Vission')->nullable();
            $table->text('Enviroment')->nullable();
            $table->text('EmployeeProgressNote')->nullable();
            $table->text('OurPeopleNote')->nullable();
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
        Schema::dropIfExists('aboutpages');
    }
}
