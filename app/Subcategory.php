<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public $timestamps = false;
    protected $table = 'subcategory';
    protected $primaryKey = 'subcategory_id';
    protected $fillable = ['category_id', 'title', 'type', 'link'];
}
