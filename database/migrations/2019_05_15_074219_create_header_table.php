<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img_path', 200);
            $table->string('link', 200);
            $table->string('keywords', 200);
            $table->string('description', 200);
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
        Schema::dropIfExists('header');
    }
}
