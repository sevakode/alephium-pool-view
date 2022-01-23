<?php

namespace App\Models;

use App\Services\NodeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Farmer extends Model
{
    use HasFactory;

    public function stats()
    {
        $date_from = \Carbon\Carbon::now();
        $date_to = clone $date_from;
        $date_fromHour = clone $date_from;

        $date_fromHour->subSeconds(3600);
        $date_from->subSeconds(86400);

        $shares = \App\Models\Share::where('worker', $this->address)->whereBetween('created_date', [$date_from, $date_to])->get();
        $hashrate = $shares->sum('pool_diff');
        $hashrateDay = $hashrate * 16 * pow(2, 30) / 86400;

        $shares = \App\Models\Share::where('worker', $this->address)->whereBetween('created_date', [$date_fromHour, $date_to])->get();
        $hashrate = $shares->sum('pool_diff');
        $hashrateHour = $hashrate * 16 * pow(2, 30) / 3600;

        return ['day' => round($hashrateDay / 1000000), 'hour' => round($hashrateHour / 1000000)];
    }

    public function balance()
    {
        $nodeService = NodeService::make();
        $balance = $nodeService->balance($this->address);

        $rates = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=alephium');

        $rates = json_decode($rates->body());
        $balance = json_decode($balance);
        $balance = substr($balance->balanceHint, 0, -5); // возвращает "abcd"
        $balance=round($balance, 4);

        $usd=round($balance * $rates[0]->current_price, 4);
        return ['ALPH' => $balance, 'USD' =>$usd ];
    }
}
