<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class Usuario extends Model
{
    protected $table = 'usuarios';
    public $primaryKey = 'id';
    public $timestamps = false;
}