<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class MainTitleLeft extends Model
{
    use HasApiTokens, Notifiable;
   protected $fillable = [
       'english_text', 'china_text'
   ];
    public $timestamps = false;
}
