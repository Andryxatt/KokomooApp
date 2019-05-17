<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsArtist extends Model
{

    protected $fillable = [
        'artist_id', 'category_english','category_china','date_news'
    ];
    public $timestamps = false;
    public function artist()
    {
        return $this->belongsTo('App\Artist', 'artist_id', 'artist_id');
    }
    public function newsContent()
    {
        return $this->hasMany('App\NewsContent' , 'news_id','news_id');
    }
    public function firstCont($id){

        return NewsContent::where("news_id", $id)->first();
    }
}
