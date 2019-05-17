<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class NewsContent extends Model implements \Countable
{

    protected $fillable = [
        'news_id', 'photo','photo_title','text_china','text_english'
    ];
    public $timestamps = false;

    public function newsArtist()
    {
        return $this->belongsTo('App\NewsArtist', 'news_id', 'news_id');
    }

    /**
     * Count elements of an object
     * @link https://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count ()
    {

    }
}
