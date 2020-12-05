<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    public function getRouteKeyName(){
        return 'slug';
    }
    use HasFactory;

   // protected $fillable = ['title','body','slug', 'user_id', 'category_id'];

    protected $guarded =[];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function replies(){
        return $this->hasMany('App\Models\Reply');
    }

    public function getPathAttribute(){
        return asset("api/question/$this->slug");
    }
}