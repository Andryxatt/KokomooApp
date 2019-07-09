<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Artist extends Model
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        //Removed date_birthday
      'full_name', 'specialization', 'image','slug', 'artist_bio_id'
    ];
    public $timestamps = false;
//One Artist has many news
//    public function newsArtist ()
//    {
//        return $this->hasMany('App\NewsArtist', 'artist_id', 'artist_id');
//    }
//Add method one to one Artist Bio
public function ArtistBios(){
    return $this->hasMany('App\ArtistBio', 'artist_id','artist_id');
}
}
