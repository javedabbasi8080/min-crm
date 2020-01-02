<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    //fillable
    protected $fillable = ['first_name','last_name','company_id','email','phone'];
}
