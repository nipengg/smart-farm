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
        Schema::create('plot_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plot_id');
            $table->integer('ph_val');
            $table->integer('temp_val');
            $table->timestamps();
            $table->foreign('plot_id')->references('id')->on('plots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plot_data');
    }
};
