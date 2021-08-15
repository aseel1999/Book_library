<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Rules\Filter;
use Illuminate\Support\Str;

class Book extends Model
{
    use SoftDeletes;
    //
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
    protected $fillable=['title','author','category_id','available'];
    //Accessor Exists Attributes//$model->name
    public function getTitleAttribute($value){
        if($this->trashed()){
            return $value.'(Deleted)';
        }
        return $value;
    }
    public function getOriginalTitleAttribute(){
        return $this->attributes['title'];
    }
    public function setTitleAttribute($value){
        $this->attributes['title']=Str::title($value);
    }
    /*protected static function booted(){
        static::addGlobalScope('active',function(Builder $builder){
            $builder->where('books.status','=','active');
        });


    }*/

    public static function validateRules(){
        return[
            'title'=>['required','string','max:255','min:3','unique:title',
                        function($attribute,$value,$fail){
                            if(stripos($value,'god')!==false){
                                $fail('You cannot use word "god"in your input');

                            }
                        }],
            'author'=>'required|string|max:255|min:3|unique:author',
            'description'=>['nullable','min:5',
            //'filter:unknown,nothing',
            new Filter(['unknown','nothing']),
                    ],
            'category_id'=>'required|int|exists:categories,id',
            'available'=>'required|int|in:1,0',
        ];
    }
    public function message(){
        return[
            'required.title'=>"الحقل :attribute مطلوب",
            'required.author'=>"الحقل :attribute مطلوب",
            'required.category_id'=>"الحقل :attribute مطلوب",
            'required.available'=>"الحقل :attribute مطلوب",
        ];
    }
}
