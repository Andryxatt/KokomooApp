<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Artist extends Model
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
      'artist_id','full_name', 'specialization', 'date_birthday',
    ];
    public $timestamps = false;

    public function newsArtist ()
    {
        return $this->hasMany('App\NewsArtist', 'artist_id', 'artist_id');
    }
}
