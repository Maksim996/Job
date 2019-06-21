<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preview', function (Blueprint $table) {
            $table->increments('preview_id');
            $table->unsignedInteger('inner_news_id');
            $table->foreign('inner_news_id')->references('inner_news_id')->on('inner_news')->onUpdate('cascade')->onDelete('cascade');
            $table->text('img_path');
            $table->string('short_location_ua', 200)->nullable();
            $table->string('short_location_ru', 200)->nullable();
            $table->string('short_location_us', 200)->nullable();
            $table->string('short_description_ua', 200);
            $table->string('short_description_ru', 200)->nullable();
            $table->string('short_description_us', 200)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preview');
    }
}
