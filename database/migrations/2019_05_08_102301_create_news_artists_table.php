<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_artists', function (Blueprint $table) {
            $table->increments('news_id');
            $table->integer('artist_id')->unsigned()->index()->nullable();
            $table->foreign('artist_id')->references('artist_id')->on('artists');
            $table->string('category_english');
            $table->string('category_china');
            $table->date('date_news');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_artists');
    }
}
