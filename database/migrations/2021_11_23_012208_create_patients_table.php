<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('tele_phone_no');
            $table->string('email')->nullable();
            $table->date('date_of_birth');        
          //  $table->unsignedBigInteger('doctor_id');
           // $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->string('status')->default('a');
            $table->boolean('isDeleted')->default(0);
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
        Schema::dropIfExists('patients');
    }
}
