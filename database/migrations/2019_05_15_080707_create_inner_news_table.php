<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInnerNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inner_news', function (Blueprint $table) {
            $table->increments('inner_news_id');
            $table->unsignedInteger('preview_id');
            $table->foreign('preview_id')->references('preview_id')->on('preview')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title', 200);
            $table->dateTime('date');
            $table->string('full_location', 200);
            $table->string('full_description', 200);
            $table->string('keywords', 200);
            $table->string('description', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inner_news');
    }
}
