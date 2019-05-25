<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InnerNews extends Model
{
    public $timestamps = false;
    protected $table = 'inner_news';
    protected $primaryKey = 'inner_news_id';
    protected $fillable = ['type', 'title', 'date', 'full_location', 'full_description', 'keywords', 'description'];
}
