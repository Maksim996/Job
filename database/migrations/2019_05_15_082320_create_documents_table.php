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
            $table->string('category', 200);
            $table->string('title', 200);
            $table->dateTime('doc_date');
            $table->string('file_link', 200);
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
