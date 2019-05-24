<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
	public $timestamps = false;
    protected $table = 'partners';
    protected $primaryKey = 'id';
    protected $fillable = ['name_brand', 'img_path', 'link'];
}
