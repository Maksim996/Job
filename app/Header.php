<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    public $timestamps = false;
    protected $table = 'header';
    protected $primaryKey = 'id';
    protected $fillable = ['img_path', 'title', 'link', 'content', 'keywords', 'description'];
}
