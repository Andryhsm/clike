<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEncasementProductAttributeOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encasement_attribute_option', function(Blueprint $table) {
            $table->increments('encasement_attribute_option_id');
            $table->integer('encasement_product_id')->index('idx_encasement_product_id')->unsigned();
            $table->integer('attribute_option_id')->unsigned();
            $table->foreign('encasement_product_id')
                    ->references('encasement_product')->on('encasement_product_id')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
