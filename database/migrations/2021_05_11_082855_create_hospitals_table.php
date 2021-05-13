<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('user_id');
            $table->string('slug')->unique();
            $table->string('email');
            $table->string('phone');
            $table->string('website');
            $table->date('establishment_date');
            $table->longText('description');
            $table->string('address',255);
            $table->string('logo')->nullable();
            $table->json('social');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('hospitals');
    }
}
