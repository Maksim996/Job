<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    public $timestamps = false;
    protected $table = 'footer';
    protected $primaryKey = 'footer_id';
    protected $fillable = ['img_path', 'link', 'content', 'type', 'name', 'color_bg'];
}
