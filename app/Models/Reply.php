<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\Question;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = ['body', 'question_id', 'user_id'];

    public function likes(){
        return $this->hasMany('App\Models\Like');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function question(){
        return $this->belongsTo('App\Models\Question');
    }
}