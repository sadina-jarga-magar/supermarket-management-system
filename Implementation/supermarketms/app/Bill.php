<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bill";
    protected $primaryKey = "bill_id";
    protected $fillable = ['order_id', 'P_id', 'quantity'];
}
