<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockController extends Controller
{
    //
    public function forDay(){
        $date_from=\Carbon\Carbon::now();
        $date_to=clone $date_from;
        $date_from->subDay();
        $blocks=\App\Models\Block::whereBetween('created_date', [$date_from, $date_to]);
        dd($blocks->get());

    }
}
