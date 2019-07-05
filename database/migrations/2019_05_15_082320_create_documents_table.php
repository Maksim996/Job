<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('doc_id');
            $table->unsignedInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('subcategory_id')->on('subcategory')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title_ua', 200);
            $table->string('title_ru', 200)->nullable();
            $table->string('title_us', 200)->nullable();
            $table->text('placeholder_ua')->nullable();
            $table->text('placeholder_ru')->nullable();
            $table->text('placeholder_us')->nullable();
            $table->dateTime('doc_date');
            $table->string('file_link', 200);
            $table->string('type', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
