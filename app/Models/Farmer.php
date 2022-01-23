<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;
    public function stats(){
        $date_from = \Carbon\Carbon::now();
        $date_toDay = clone $date_from;
        $date_toHour = clone $date_from;

        $date_from->subSeconds(86400);
        $shares = \App\Models\Share::where('worker', $this->worker)->whereBetween('created_date', [$date_from, $date_toDay])->get();
        $hashrate = $shares->sum('pool_diff');
        $hashrateDay = $hashrate* 16 * pow(2,30) / 86400;

        $shares = \App\Models\Share::where('worker', $this->worker)->whereBetween('created_date', [$date_from, $date_toHour])->get();
        $hashrate = $shares->sum('pool_diff');
        $hashrateHour= $hashrate* 16 * pow(2,30) / 3600;

        return ['day'=>$hashrateDay/1000000,'hour'=>$hashrateHour] ;
    }
}
