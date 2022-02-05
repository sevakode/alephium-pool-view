<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Services\NodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Symfony\Component\String\s;

class FarmerController extends Controller
{
    public function index(){
        $stats=new BotController();
        $stats=$stats->statsPool();

        return view('welcome',["blockHour"=>$stats['blockHour'],'hash'=>$stats['hash'],'count'=>$stats['revenue']]);

    }
    public function show($address){
        return view('farmer');
    }
}
