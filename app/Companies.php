<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    //fillable
    protected $fillable = ['name', 'email', 'logo'];
}
