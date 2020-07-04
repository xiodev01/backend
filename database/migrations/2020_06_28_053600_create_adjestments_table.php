<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdjestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjestments', function (Blueprint $table) {
            $table->id();
            $table->string('Home_Activate_Welcome_Section')->nullable(); ;
            $table->string('Home_Activate_Welcome_Image')->nullable(); ;
            $table->string('Home_Activate_Welcome_Note')->nullable(); ;
            $table->string('Home_Activate_Imports_Note')->nullable(); ;
            $table->string('Home_Activate_Export_Note')->nullable(); ;
            $table->string('Home_Activate_Our_Products_Section')->nullable(); ;
            $table->string('Home_Activate_Product_Slide_Show')->nullable(); ;
            $table->string('Home_Activate_Services_Section')->nullable(); ;
            $table->string('Home_Activate_Services_Section_Note')->nullable(); ;
            $table->string('About_Activate_About_Section')->nullable(); ; 
            $table->string('About_Activate_About_Image')->nullable(); ; 
            $table->string('About_Activate_About_Note')->nullable(); ; 
            $table->string('About_Activate_Vision_Mission_Section')->nullable(); ; 
            $table->string('About_Activate_Mission')->nullable(); 
            $table->string('About_Activate_Vision')->nullable(); ; 
            $table->string('About_Activate_Enviroment_Section')->nullable(); ; 
            $table->string('About_Activate_Enviroment_Note')->nullable(); ; 
            $table->string('About_Activate_Employee_Progress')->nullable(); ; 
            $table->string('About_Activate_Our_People')->nullable(); ; 
            $table->string('Import_Activate_Import_Notes')->nullable(); ; 
            $table->string('Import_Activate_Import_Products')->nullable(); ; 
            $table->string('Export_Activate_Export_Notes')->nullable(); ; 
            $table->string('Export_Activate_Export_Products')->nullable(); ; 
            $table->string('CSR_Activate_CSR_Note')->nullable(); ; 
            $table->string('CSR_Activate_Contact_us_box')->nullable(); ; 
            $table->string('CSR_Activate_About_us_box')->nullable(); ; 
            $table->string('Contact_Activate_Contact_Details')->nullable(); ; 
            $table->string('Contact_Activate_Contact_Form')->nullable(); ; 
            $table->string('Contact_Activate_Map')->nullable(); ;
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
        Schema::dropIfExists('adjestments')->nullable(); ;
    }
}
