<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";
    protected $fillable = ['code','name','price','quantity'];
    const CREATED_AT = null;
    const UPDATED_AT = null;

}
