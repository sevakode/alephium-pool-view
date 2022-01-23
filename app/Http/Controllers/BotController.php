<?php

namespace App\Http\Controllers;

use App\Http\TelegramSender;
use App\Models\Farmer;
use App\Models\Share;
use Illuminate\Http\Request;

class BotController extends Controller
{
    //
    public function init(Request $request){
        $telegram=new TelegramSender();
        $farmer=Farmer::where('telegram_id',$request->from->id)->first();
        if($farmer){
          if($request->message->text=="/stats"){
              $stats=$farmer->stats();
              $telegram->sendMessage($request->from->id,$stats);
          }
          else{
              $telegram->sendMessage($request->from->id,"Я тебя не понимаю");
          }
        }
        else{
            $shares=Share::where('worker',$request->message->text)->first();
            if($shares){
                $farmer=new Farmer ();
                $farmer->telegram_id=$request->from->id;
                $farmer->address=$request->message->text;
                $farmer->save();
            }
            else{
               $telegram->sendMessage($request->from->id,"Введите номер кошелька");
            }
        }
    }
}
