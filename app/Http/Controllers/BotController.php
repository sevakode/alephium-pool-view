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

        $message=$request->get('message');
        if(in_array($message['from']['id'],['689839038','762177209'])){
//            $telegram->sendMessage($message['from']['id'],$message);

            $farmer=Farmer::where('address',$message['text'])->get()->first();

            if($farmer){
                $stats=$farmer->stats();

                if($stats['day']>1000){
                    $stats['day']=$stats['day']/1000;
                    $stats['hour']=$stats['hour']/1000;

                    $text="Хешрейт за 24 часа: ".$stats['day']."GH/s\nХешрейт за 1 час: ".$stats['hour']."GH/s";
                }
                else{
                    $text="Хешрейт за 24 часа: ".$stats['day']."Mh/s\nХешрейт за 1 час: ".$stats['hour']."Mh/s";

                }
            }
            else{
                $stats=Share::stats();
                $stats['day']=$stats['day']/1000;
                $stats['hour']=$stats['hour']/1000;

                $text="Хешрейт за 24 часа: ".$stats['day']."GH/s\nХешрейт за 1 час: ".$stats['hour']."GH/s";
            }
            $telegram->sendMessage($message['from']['id'],$text);

        }
        else{
            $farmer=Farmer::where('telegram_id',$message['from']['id'])->get()->first();

            if($farmer){
                if($message['text']=="/stats"){
                    $stats=$farmer->stats();

                    if($stats['day']>1000){
                        $stats['day']=$stats['day']/1000;
                        $stats['hour']=$stats['hour']/1000;

                        $text="Хешрейт за 24 часа: ".$stats['day']."GH/s\nХешрейт за 1 час: ".$stats['hour']."GH/s";
                    }
                    else{
                        $text="Хешрейт за 24 часа: ".$stats['day']."Mh/s\nХешрейт за 1 час: ".$stats['hour']."Mh/s";

                    }
                    $telegram->sendMessage($message['from']['id'],$text);
                }
                else{
                    $telegram->sendMessage($message['from']['id'],"Я тебя не понимаю");
                }
            }
            else{
                $shares=Share::where('worker',$message['text'])->first();
                if($shares){
                    $farmer=new Farmer ();
                    $farmer->telegram_id=$message['from']['id'];
                    $farmer->address=$message['text'];
                    $farmer->save();
                    $telegram->sendMessage($message['from']['id'],"Кошелек добавлен");

                }
                else{
                    $telegram->sendMessage($message['from']['id'],"Введите адрес кошелька");
                }
            }
        }

    }
}
