<?php

namespace App\Http\Controllers;

use App\Model\Like;
use Illuminate\Http\Request;
use App\Model\Reply;
use Config;

class LikeController extends Controller
{
    public function Liked(Reply $reply) {
        $reply->like()->create([
            // 'user_id'   => auth->id(),
            'user_id'   => Config::get('app.app_user_id')
        ]);
    }
   
    public function Unliked(Reply $reply) {      
        //$reply->like()->where(['user_id',auth()->id()])->first()->delete();
        $reply->like()->where('user_id', Config::get('app.app_user_id'))->first()->delete();
    }
}
