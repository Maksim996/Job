<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    public $timestamps = false;
    protected $table = 'documents';
    protected $primaryKey = 'doc_id';
    protected $fillable = ['subcategory_id', 'title', 'doc_date', 'file_link'];
}
