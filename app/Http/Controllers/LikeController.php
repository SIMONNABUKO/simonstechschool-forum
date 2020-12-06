<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;

class LikeController extends Controller
{
    public function like(Reply $reply)

    {
        $reply->likes()->create([
           // 'user_id'=>auth()->id;
           'user_id'=>'1'
        ]);
    }

    public function unlike(Reply $reply)

    {
        // $reply->like()->where('user_id', auth()->id)->first();
        $reply->likes()->where('user_id', '1')->first()->delete();
        
    }
}