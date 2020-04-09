<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $fillable = ['id','nama','input_barang','exp_barang'];
}
