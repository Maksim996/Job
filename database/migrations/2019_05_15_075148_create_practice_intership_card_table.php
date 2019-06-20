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
            $table->string('card_link', 200);
            $table->string('img_path', 200)->nullable();
            $table->string('card_title_ua', 200);
            $table->string('card_title_ru', 200)->nullable();
            $table->string('card_title_us', 200)->nullable();
            $table->text('card_description_ua');
            $table->text('card_description_ru')->nullable();
            $table->text('card_description_us')->nullable();
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
