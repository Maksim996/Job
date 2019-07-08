<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer', function (Blueprint $table) {
            $table->increments('footer_id');
            $table->text('img_path')->nullable();
            $table->text('link')->nullable();
            $table->text('content_ua')->nullable();
            $table->text('content_ru')->nullable();
            $table->text('content_us')->nullable();
            $table->string('name', 200);
            $table->string('type', 200);
            $table->string('color_bg', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footer');
    }
}
