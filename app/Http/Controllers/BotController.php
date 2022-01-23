<?php

namespace App\Http\Controllers;

use App\Http\TelegramSender;
use Illuminate\Http\Request;

class BotController extends Controller
{
    //
    public function init(Request $request){
        $telegram=new TelegramSender();
        $resp=$telegram->sendMessage('689839038',$request->all());
        dd($resp);
    }
}
