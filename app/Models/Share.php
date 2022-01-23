<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    static function statsPool(){
        $date_from = \Carbon\Carbon::now();
        $date_to = clone $date_from;
        $date_fromHour = clone $date_from;

        $date_fromHour->subSeconds(3600);
        $date_from->subSeconds(86400);

        $shares = self::whereBetween('created_date', [$date_from, $date_to])->get();
        $hashrate = $shares->sum('pool_diff');
        $hashrateDay = $hashrate* 16 * pow(2,30) / 86400;

        $shares = self::whereBetween('created_date', [$date_fromHour, $date_to])->get();
        $hashrate = $shares->sum('pool_diff');
        $hashrateHour = $hashrate * 16 * pow(2,30) / 3600;

        return ['day'=>round($hashrateDay/1000000),'hour'=>round($hashrateHour/1000000)] ;
    }
    static function stats($worker){
        $date_from = \Carbon\Carbon::now();
        $date_to = clone $date_from;
        $date_fromHour = clone $date_from;

        $date_fromHour->subSeconds(3600);
        $date_from->subSeconds(86400);

        $shares = self::where('worker',$worker);
        if($shares->first()){
            $hashrate = $shares->whereBetween('created_date', [$date_from, $date_to])->get()->sum('pool_diff');
            $hashrateDay = $hashrate* 16 * pow(2,30) / 86400;

            $hashrate = $shares->whereBetween('created_date', [$date_fromHour, $date_to])->get()->sum('pool_diff');
            $hashrateHour = $hashrate * 16 * pow(2,30) / 3600;

            return ['day'=>round($hashrateDay/1000000),'hour'=>round($hashrateHour/1000000)] ;
        }
        else{
            return null;
        }

    }
    use HasFactory;
}
