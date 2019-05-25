<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PracticeIntershipCard extends Model
{
    public $timestamps = false;
    protected $table = 'practice_intership_card';
    protected $primaryKey = 'card_id';
    protected $fillable = ['content_id', 'card_link', 'img_path', 'card_title', 'card_description'];
}
