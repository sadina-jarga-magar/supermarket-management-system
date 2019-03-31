<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table= "order";
    protected $primaryKey="O_id";
    protected $fillable = ['quantity'];
}
