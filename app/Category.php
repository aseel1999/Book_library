<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    public function books(){
        return $this->hasMany(Book::class);
    }
    protected $fillable =['cat_name'];
   public static function validateRules(){
       return[
        'cat_name'=>'required|string|max:255|min:3|unique:cat_name',
       ];
   }
}
