<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderNews extends Model
{
    public $timestamps = false;
    protected $table = 'slider_news';
    protected $primaryKey = 'id';
    protected $fillable = ['inner_news_id', 'img_path'];
}
