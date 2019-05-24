<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preview extends Model
{
    public $timestamps = false;
    protected $table = 'preview';
    protected $primaryKey = 'preview_id';
    protected $fillable = ['inner_news_id', 'img_path', 'short_location', 'short_description'];
}
