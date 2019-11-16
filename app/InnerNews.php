<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InnerNews extends Model
{



    public $timestamps = false;
    protected $table = 'inner_news';
    protected $primaryKey = 'inner_news_id';
    protected $appends = ['trans_title'];
    protected $fillable = [
        'type',
        'title_ua',
        'title_ru',
        'title_us',
        'date',
        'full_location_ua',
        'full_location_ru',
        'full_location_us',
        'full_description_ua',
        'full_description_ru',
        'full_description_us',
        'keywords',
        'description',
        'link'];

    public function preview()
    {
        return $this->hasOne('App\Preview', 'inner_news_id','inner_news_id');
    }
    public function toSearchableArray()
    {

        $array = $this->toArray();

        return array('title_ua' => $array['title_ua'],'full_description_ua' => $array['full_description_ua']);
    }

    public function getTransTitleAttribute()
    {
        return transliterate($this->title_ua);
    }



}
