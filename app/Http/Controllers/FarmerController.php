<?php

namespace App\Http\Controllers;

use App\Services\NodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FarmerController extends Controller
{
    public function index(){
        $date_from=\Carbon\Carbon::now();
        $date_to=clone $date_from;
        $date_from->subHour();
        $blocks=\App\Models\Block::whereBetween('created_date', [$date_from, $date_to])->get();
        return view('welcome',["blocks"=>$blocks,'blockHour'=>$blocks->count()]);

    }
    public function show($address){
        return view('farmer');
    }
}
