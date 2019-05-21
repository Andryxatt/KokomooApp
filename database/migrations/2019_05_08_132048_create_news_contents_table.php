<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_contents', function (Blueprint $table) {
            $table->increments('content_id');
            $table->integer('news_id')->unsigned()->index()->nullable();
            $table->foreign('news_id')->references('news_id')->on('news_artists');
            $table->string('photo')->nullable();
            $table->string('photo_title')->nullable();
            $table->longText('text_china')->nullable();
            $table->longText('text_english')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_contents');
    }
}
