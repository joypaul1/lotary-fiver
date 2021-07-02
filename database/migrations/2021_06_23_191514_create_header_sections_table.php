<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('logo')->nullable();
            $table->string('background_image')->nullable();
            $table->string('coin_gif')->nullable();
            $table->string('person_gif')->nullable();
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
        Schema::dropIfExists('header_sections');
    }
}
