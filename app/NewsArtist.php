<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravel\Scout\Searchable;

class NewsArtist extends Model
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        //Change field artist_id to author_name
        'author_name', 'category_english','category_china','date_news', 'slug'
    ];
    public $timestamps = false;
    //Remove method artist news
//    public function artist()
//    {
//        return $this->belongsTo('App\Artist', 'artist_id', 'artist_id');
//    }
    public function newsContent()
    {
        return $this->hasMany('App\NewsContent' , 'news_id','news_id');
    }
    public function firstCont($id){

        return NewsContent::where("news_id",'LIKE', $id)->first();
    }

}
