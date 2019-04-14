<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addcart extends Model
{
    protected $table="addcart";
    protected $fillable=['P_id','user_id']; 
}
