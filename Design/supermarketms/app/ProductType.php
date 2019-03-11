<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table="producttype";
    protected $primaryKey="Ptype_id";
    protected $fillable=['Ptype_name'];
}
