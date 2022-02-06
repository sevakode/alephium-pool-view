<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Services\NodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use function Symfony\Component\String\s;

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
        $hash = $controller->stats($address);
        $balance = $controller->balance($address);

        return view('farmer', [
            'hash' => $hash,
            'balance'=>$balance
        ]);
    }
}
