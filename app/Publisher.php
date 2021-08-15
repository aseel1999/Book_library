<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
   public function books(){
   return $this_>hasMany(Book::class);

   }
   protected $fillable=['name','book_id','year_of_publisher'];
   public static function validateRules(){
      return[
         'name'=>'required|string|max:255|min:3|unique:name',
         'book_id'=>'required|int|exists:books,id',
         'year_of_publisher'=>'required|int',
      ];
  }
  public function message(){
   return[
       'required.name'=>"الحقل :attribute مطلوب",
       'required.book_id'=>"الحقل :attribute مطلوب",
       'required.year_of_publisher'=>"الحقل :attribute مطلوب",
       
   ];
}
}
