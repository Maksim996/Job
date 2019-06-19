<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticeIntershipContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_intership_content', function (Blueprint $table) {
            $table->increments('content_id');
            $table->string('title_ua', 200);
            $table->string('title_ru', 200)->nullable();
            $table->string('title_us', 200)->nullable();
            $table->text('content_ua');
            $table->text('content_ru')->nullable();
            $table->text('content_us')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practice_intership_content');
    }
}
