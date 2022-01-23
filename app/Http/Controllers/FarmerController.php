<?php

namespace App\Http\Controllers;

use App\Services\NodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FarmerController extends Controller
{
    public function balance($address){
        $nodeService=NodeService::make();
        $resp=$nodeService->balance($address);
        dd($resp);
    }
}
