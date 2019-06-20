<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PracticeIntershipCard extends Model
{
    public $timestamps = false;
    protected $table = 'practice_intership_card';
    protected $primaryKey = 'card_id';
    protected $fillable = ['card_link', 'img_path', 'card_title_ua','card_title_ru','card_title_us', 'card_description_ua','card_description_ru','card_description_us'];
}
