<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Request;
use LRedis;

class ChatController extends Controller{
    public function __construct()

    {
        $this->middleware('auth');
    }

    public function sendMessage(){

        $redis = LRedis::connection();
        $data = ['message' => Request::input('message'), 'user' => Request::input('user')];
        $redis->publish('message', json_encode($data));
        return response()->json([]);
   }

     public function index()
    {
        return view('chat');
    }


}

