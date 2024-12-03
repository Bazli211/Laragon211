<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
   public $table = 'lecture_groups';
   protected $fillable = [
    'name','part','total_students'
   ];
    //
    public static function rules()
    {
        return [
            'name' => 'required',
            'part' => 'required',
            'total_students' => 'nullable|integer|required',
        ];
    }
}
