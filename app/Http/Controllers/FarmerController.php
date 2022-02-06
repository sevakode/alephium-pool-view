<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Services\NodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class FarmerController extends Controller
{
    public function index()
    {

        $controller=new BotController();
        $stats=$controller->statsPool();

        return view('welcome',["blockHour"=>$stats['blockHour'],'hash'=>$stats['hash'],'count'=>$stats['revenue']]);

    }

    public function show($address)
    {
        $controller = new BotController();
        $balance = $controller->balance($address);

        $hash = $controller->stats($address);
        dd($balance,$hash);
        return view('farmer', [
            'hash' => $hash,
            'balance'=>$balance
        ]);
    }
}
