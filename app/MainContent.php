<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class MainContent extends Model
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'title_english', 'title_china', 'photo'
    ];
    public $timestamps = false;
}
