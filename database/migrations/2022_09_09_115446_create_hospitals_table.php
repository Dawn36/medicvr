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
            $table->bigIncrements('user_id');
            $table->string('hospital_name')->nullable();
            $table->string('hospital_phone')->nullable();
            $table->string('hospital_email')->nullable();
            $table->string('hospital_address')->nullable();
            $table->string('hospital_small_logo')->nullable();
            $table->string('hospital_hi_rest_logo')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->softDeletes();
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
