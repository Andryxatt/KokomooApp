<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $fillable = [
        'title_english', 'title_china','text_english','text_china'
    ];
    public $timestamps = false;
}
