<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class features extends Model
{
    protected $fillable = ['packageId', 'feature_name', 'feature_desc', 'feature_code'];

}