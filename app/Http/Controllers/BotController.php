<?php

namespace App\Http\Controllers;

use App\Http\TelegramSender;
use App\Models\Farmer;
use App\Models\Share;
use App\Services\NodeService;
use App\Services\TelegramService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class BotController extends Controller
{
    //
    public function init(Request $request)
    {
        $telegram = new TelegramSender();

        $message = $request->get('message');

        try {


            if (in_array($message['from']['id'], ['689839038', '762177209', '1463023485'])) {
//            $telegram->sendMessage($message['from']['id'],$message);


                if ($message['text'] == "/stats") {
                    $stats = $this->statsPool();

                    $text = "Хешрейт пула за 24 часа: " . $stats['hash']['day'] .
                        "GH/s\nХешрейт пула за 1 час: " . $stats['hash']['hour'] .
                        "GH/s\nПолучено блоков за 24 часа: " . $stats['revenue']['day']['count'] .
                        "\nПолучено блоков за 1 час: " . $stats['revenue']['hour']['count'];
                } else {
                    $balance = $this->balance($message['text']);

                    if ($balance) {

                        $balance = "Баланс на кошельке: " . $balance['ALPH'] . " ALPH 🅰️ ≈ " . $balance['USD'] . " USD 💵 ";

                        $stats = $this->stats($message['text']);
                        if ($stats) {
                            $text = "Хешрейт за 24 часа: " . $stats['day'] . "\nХешрейт за 1 час: " . $stats['hour'];
                        } else {
                            $text = 'Воркер не в сети';
                        }

                        $text = $balance . "\n\n" . $text . "\n\nВсе операции: https://explorer.alephium.org/#/addresses/" . $message['text'];

                    } else {
                        $text = "Не найдено";
                    }

                }
                return $telegram->sendMessage($message['from']['id'], $text);

            } else {
                $farmer = Farmer::where('telegram_id', $message['from']['id'])->select('address')->get()->first();
                if ($farmer) {
                    if ($message['text'] == "/stats") {
                        $text=$this->statWorker($farmer);
                        $telegram->sendMessage($message['from']['id'], $text);
                    } else {
                        $telegram->sendMessage($message['from']['id'], "Я тебя не понимаю");
                    }
                } else {
                    $shares = Share::where('worker', $message['text'])->first();
                    if ($shares) {
                        $farmer = new Farmer ();
                        $farmer->telegram_id = $message['from']['id'];
                        $farmer->address = $message['text'];
                        $farmer->save();
                        $telegram->sendMessage($message['from']['id'], "Кошелек добавлен");

                    } else {
                        $telegram->sendMessage($message['from']['id'], "Введите адрес кошелька");
                    }
                }

            }
            return true;
        } catch (\Exception $exception) {
            $telegram->sendMessage($message['from']['id'], $exception->getMessage());
            return false;

        }


    }

    public function statsPool()
    {
//         $resp=Http::withHeaders(
//             ['X-API-KEY'=>env('NODE_TOKEN')]
//             )->get('http://10.101.4.43:12973/blockflow/blocks/000000000010a261aabdc22bd271a941c33710ede0b3bfb79c7e66db91b110c0')->body();
//         $id=json_decode($resp)->transactions[0]->id;
//         $resp=Http::withHeaders(
//             ['X-API-KEY'=>env('NODE_TOKEN')]
//         )->get('http://10.101.4.43:12973/transactions/status?txId='.$id)->body();
//         $resp=json_decode($resp);
//
//         dd($resp);

        if (Cache::has('stats')) {
            $stats = Cache::get('stats');
        }
        else{

            $date = \Carbon\Carbon::now();
            $date_to = clone $date;
            $date_fromHour = clone $date;
            $date->subDay();
            $date_fromHour->subHour();
            $blocksDay = \App\Models\Block::whereBetween('created_date', [$date, $date_to])->get();
            $blocksHour = $blocksDay->where('created_date', '>=', $date_fromHour->format('Y-m-d H:i:s.uP'));

            $shares = Share::whereBetween('created_date', [$date, $date_to])->get();
            $sharesHours = $shares->where('created_date', '>=', $date_fromHour->format('Y-m-d H:i:s.uP'));
            $hashrate = $shares->sum('pool_diff');
            $hashrateDay = $hashrate * 16 * pow(2, 30) / 86400;
            $hashrate = $sharesHours->sum('pool_diff');
            $hashrateHour = $hashrate * 16 * pow(2, 30) / 3600;
            $stats=[
                'hash' => ['day' => round($hashrateDay / 1000000000, 3), 'hour' => round($hashrateHour / 1000000000, 3)],
                'revenue' => [
                    'day' => ['sum' => '', 'count' => $blocksDay->count()],
                    'hour' => ['sum' => '', 'count' => $blocksHour->count()],
                ],
                'blockHour' => $blocksHour
            ];
            Cache::store()->put('stats', $stats, 120); // 2 Minutes
        }
        return $stats;
    }

    public function balance($address)
    {
        if (Cache::has('balances'.$address)) {
            return Cache::get('balances'.$address);
        }
        else{
            $nodeService = NodeService::make();
            $balance = $nodeService->balance($address);

            $rates = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=alephium');

            $rates = json_decode($rates->body());
            $balance = json_decode($balance);
            if (isset($balance->balanceHint)) {
                $balance = substr($balance->balanceHint, 0, -5); // возвращает "abcd"
                $balance = round($balance, 4);

                $usd = round($balance * $rates[0]->current_price, 2);
                $balances= ['ALPH' => $balance."A", 'USD' => $usd."$"];

                Cache::store()->put('balances'.$address, $balances, 300);

                return $balances;
            } else {
                return null;

            }
        }


    }

    public function stats($address)
    {
        if (Cache::has('stats'.$address)) {
            return Cache::get('stats'.$address);
        }
        else{
            $date_from = \Carbon\Carbon::now();
            $date_to = clone $date_from;
            $date_fromHour = clone $date_from;

            $date_fromHour->subSeconds(3600);
            $date_from->subSeconds(86400);

            $shares = \App\Models\Share::where('worker', $address)->whereBetween('created_date', [$date_from, $date_to])->get();
            if ($shares->first()) {
                $hashrate = $shares->sum('pool_diff');
                $hashrateDay = $hashrate * 16 * pow(2, 30) / 86400;

                $shares = $shares->where('created_date', '>=', $date_fromHour);
                $hashrate = $shares->sum('pool_diff');
                $hashrateHour = $hashrate * 16 * pow(2, 30) / 3600;
                $day = round($hashrateDay / 1000000);
                $hour = round($hashrateHour / 1000000);

                if ($day > 1000) {
                    $day = $day / 1000;
                    $hour = $hour / 1000;

                    $hour = $hour . "GH/s";
                    $day = $day .  "GH/s";
                } else {
                    $hour = $hour  . "Mh/s";
                    $day = $day  . "Mh/s";

                }
                $stats=['day' =>$day , 'hour' =>$hour ];

                Cache::store()->put('stats'.$address, $stats, 30);

                return $stats;

            } else {
                return null;
            }
        }


    }

    public function history($address, $ethash = 500)
    {

//        $rate = Http::get('https://www.coincalculators.io/api', [
//            'hashrate' => $ethash * 1000000,
//            'name' => 'Ethereum'
//        ]);
//        $now = Carbon::now();
//        $yesterday = clone $now;
//        $yesterday->subDay();
////        $inMin=$rate->json('rewardsInHour')/60;
        $nodeService = NodeService::make();
        $utxos = $nodeService->utxos($address);

        return $utxos;

    }
    public function statWorker($farmer){
        $stats = $this->stats($farmer->address);
        $balance = $this->balance($farmer->address);
        $balance = "Баланс на кошельке: " . $balance['ALPH'] . " ALPH 🅰️ ≈ " . $balance['USD'] . " USD 💵 ";
        $text = "Хешрейт за 24 часа: " . $stats['day'] . "\nХешрейт за 1 час: " . $stats['hour'] ;

        return $balance . "\n\n" . $text . "\n\nВсе операции: https://explorer.alephium.org/#/addresses/" . $farmer->address;

    }
}
