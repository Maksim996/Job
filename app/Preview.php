<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preview extends Model
{

    public $timestamps = false;
    protected $table = 'preview';
    protected $primaryKey = 'preview_id';
    protected $fillable = [
        'inner_news_id',
        'img_path',
        'short_location_ua',
        'short_location_ru',
        'short_location_us',
        'short_description_ua',
        'short_description_ru',
        'short_description_us'];

    public function inner_news()
    {
        return $this->belongsTo('App\InnerNews','inner_news_id','inner_news_id');
    }
}
