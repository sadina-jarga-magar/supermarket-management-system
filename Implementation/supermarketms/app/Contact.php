<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table="contact";
    protected $fillable=['f_name','L_name','phn_no','email','message',];
}
