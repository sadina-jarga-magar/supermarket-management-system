<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('P_id');
            $table->string('P_name');
            $table->string('P_description');
            $table->string('P_img');
            $table->date('P_mfdate');
            $table->date('P_expdate');
            $table->double('Rate');
            $table->double('Quantity');
             $table->integer('Ptype_id')->unsigned();
            $table->foreign('Ptype_id')->references('Ptype_id')->on('producttype');
           
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
        Schema::dropIfExists('product');
    }
}
