<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class packages extends Model
{
    protected $fillable = ['package_name', 'package_description', 'price', 'status', 'package_code', 'duration', 'amount_day'];

}