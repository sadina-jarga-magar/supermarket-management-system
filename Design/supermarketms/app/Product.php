<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $primaryKey="P_id";
    protected $fillable = ['P_name', 'P_description', 'P_img',
        'P_mfdate', 'P_expdate', 'Rate'
    ];
}
