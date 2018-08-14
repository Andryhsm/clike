<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('pack', function (Blueprint $table) {

            $table->binary('product_visibility')->after('type');

            $table->string('transaction_fees')->after('type');

            $table->binary('pack_newsletter')->after('type');

        });*/
        //test
        Schema::create('pack_newsletter', function (Blueprint $table) {

            $table->increments('pack_newsletter_id');

            $table->integer('pack_id');

            $table->integer('of');

            $table->integer('at');

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
