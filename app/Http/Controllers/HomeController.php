<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    const ACTIVE = 1;
    const DONE = 0;

    public function index()
    {
        $today = Carbon::now();
        
        $render_data = [
            'totalActiveOrders' => DB::table('orders')->where('status', self::ACTIVE)->count(),
            'totalOrders' => DB::table('orders')->whereDate('created_at', $today)->count(),
            'totalSale' => DB::table('orders')->where('status', self::DONE)->sum('payment'),
            'orderAndSale' =>  DB::table('orders')->where('status', self::DONE)->get(),
        ];

        return view('main.pages.home.home', $render_data);
    }
}
