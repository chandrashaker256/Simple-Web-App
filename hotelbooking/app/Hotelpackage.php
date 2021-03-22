<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotelpackage extends Model
{
    protected $fillables = ['name','price','days','nights','activated_date','expired_date','description'];
}
