<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function Logs(){
        return $this->hasMany(Log::class);
    }
    protected$fillable=['issue_on','return_date','book_id'];
    public static function validateRules(){
        return[
            'issue_on'=>'required|date_formate:d/m/y',
            'return_date'=>'required|date|after_or_equal:issue_on',
            'book_id'=>'required|int|max:3|exists:books,id',
        ];
    }
    public function message(){
        return[
            'required.issue_on'=>"الحقل :attribute مطلوب",
            'required.return_date'=>"الحقل :attribute مطلوب",
            'required.book_id'=>"الحقل :attribute مطلوب",
        
        ];
    }
}
