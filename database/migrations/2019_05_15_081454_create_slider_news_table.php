<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_news', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inner_news_id');
            $table->foreign('inner_news_id')->references('inner_news_id')->on('inner_news')->onUpdate('cascade')->onDelete('cascade');
            $table->string('img_path', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_news');
    }
}
