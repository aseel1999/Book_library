<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function Issue(){
        return $this->belongsTo(Issue::class);
    }
    protected$fillable=['issue_id','status'];
    public static function validateRules(){
        return[
            'issue_id'=>'requierd|int|exists:issues,id',
            'status'=>'required|int|in:1,-1',
        ];
    }
    public function message(){
        return[
            'required.issue_id'=>"الحقل :attribute مطلوب",
            'required.status'=>"الحقل :attribute مطلوب",
            
        ];
    }
}
