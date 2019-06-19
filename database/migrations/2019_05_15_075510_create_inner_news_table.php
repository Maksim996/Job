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
            $table->string('type', 200);
            $table->dateTime('date');
            $table->string('title_ua', 200);
            $table->string('title_ru', 200)->nullable();
            $table->string('title_us', 200)->nullable();
            $table->string('full_location_ua', 200)->nullable();
            $table->string('full_location_ru', 200)->nullable();
            $table->string('full_location_us', 200)->nullable();
            $table->text('full_description_ua');
            $table->text('full_description_ru')->nullable();
            $table->text('full_description_us')->nullable();
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
