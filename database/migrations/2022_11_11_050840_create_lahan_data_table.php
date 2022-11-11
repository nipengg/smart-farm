<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lahan_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lahan_id');
            $table->integer('ph_val');
            $table->integer('temp_val');
            $table->timestamps();
            $table->foreign('lahan_id')->references('id')->on('lahans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lahan_data');
    }
};
