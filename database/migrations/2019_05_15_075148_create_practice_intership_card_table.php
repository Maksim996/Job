<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticeIntershipCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_intership_card', function (Blueprint $table) {
            $table->increments('card_id');
            $table->unsignedInteger('content_id');
            $table->foreign('content_id')->references('content_id')->on('practice_intership_content')->onUpdate('cascade')->onDelete('cascade');
            $table->string('card_link', 200);
            $table->string('img_path', 200);
            $table->string('card_title', 200);
            $table->text('card_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practice_intership_card');
    }
}
