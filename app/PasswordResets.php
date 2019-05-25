<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordResets extends Model
{
    public $timestamps = false;
    protected $table = 'password_resets';
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'token', 'created_at'];
}
