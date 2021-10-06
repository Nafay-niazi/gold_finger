<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_measurements', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedBigInteger('customer_id');
            $table->string('dress_length');
            $table->string('dress_teera');
            $table->string('dress_teera_style');
            $table->string('dress_bazoo');
            $table->string('dress_galla');
            $table->string('dress_galla_style');
            $table->string('dress_kandha');
            $table->string('dress_kohni');
            $table->string('dress_chaati');
            $table->string('dress_darmean');
            $table->string('dress_kamar');
            $table->string('dress_hip');
            $table->string('dress_shalwar_trouser');
            $table->string('dress_pancha');
            $table->string('dress_shalwar_ghaira');
            $table->string('dress_thai');
            $table->string('dress_godda');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('users');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_measurements');
    }
}
