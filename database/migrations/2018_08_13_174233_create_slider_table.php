<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('slider', function (Blueprint $table) {
            $table->increments('slider_id');
			$table->string('slider_title')->nullable();
			$table->binary('is_active');
			$table->string('alt')->nullable();
			$table->string('slider_image')->nullable();
            $table->integer('created_by')->nullable();
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
        //
        Schema::dropIfExists('slider');
    }
}
