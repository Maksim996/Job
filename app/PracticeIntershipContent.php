<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PracticeIntershipContent extends Model
{
    public $timestamps = false;
    protected $table = 'practice_intership_content';
    protected $primaryKey = 'content_id';
    protected $fillable = ['title', 'content'];
}
