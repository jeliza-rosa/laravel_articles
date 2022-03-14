<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_article', function (Blueprint $table) {
            $table->unsignedInteger('article_id');
            $table->unsignedInteger('tag_id');
            $table->primary(['article_id', 'tag_id']);
            $table->foreign('article_id')->references('id')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_article');
    }
};
