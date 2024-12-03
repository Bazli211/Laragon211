<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
   public $table = 'days'; //guna table days
   protected $fillable = [  //rujuk table days
    'name'
   ]; //
}
