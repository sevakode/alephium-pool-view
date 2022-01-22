<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function forDay($worker){
        $date_from=\Carbon\Carbon::now();
        $date_to=clone $date_from;
        $date_from->subDay();
        $shares=\App\Models\Share::where('worker',$worker)->whereBetween('created_date', [$date_from, $date_to]);
        dd($shares->get()->first());
    }
    public function forHour($worker){
        $date_from=\Carbon\Carbon::now();
        $date_to=clone $date_from;
        $date_from->subHour();
        $shares=\App\Models\Share::where('worker',$worker)->whereBetween('created_date', [$date_from, $date_to]);
        dd($shares->get()->first());
    }
}
