<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategory', function (Blueprint $table) {
            $table->increments('subcategory_id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('category')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title_ua', 200);
            $table->string('title_ru', 200)->nullable();
            $table->string('title_us', 200)->nullable();
            $table->string('type', 200);
            $table->string('link', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategory');
    }
}
