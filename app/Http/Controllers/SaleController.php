<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    const DONE = 0;

    public function index()
    {

        $access_rule = explode(',', auth()->user()->access_rule);
        if (!in_array("3", $access_rule)) {
            return abort(404);
        }

        return view('main.pages.sales.sales');
    }

    public function show(Request $request)
    {
        $render_data = [];
        $today = Carbon::now();
        $month = Carbon::now()->format('m');

        $render_data['orders'] = DB::table('orders')
            ->join('cakes', 'orders.cake_id', '=', 'cakes.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.id', 'orders.orders', 'orders.payment', 'orders.status', 'orders.created_at', 'cakes.image_path', 'cakes.cakename', 'users.fname', 'users.mname', 'users.lname', 'users.province', 'users.municipality', 'users.village', 'users.street', 'users.pnumber');

        switch ($request->filterby) {
            case 1:
                $render_data['orders'] = $render_data['orders']->whereDate('orders.created_at', $today)->where('orders.status', self::DONE)->get();
                break;
            case 2:
                $render_data['orders'] = $render_data['orders']->whereMonth('orders.created_at', $month)->where('orders.status', self::DONE)->get();
                break;
            case 3:
                $render_data['orders'] = $render_data['orders']->whereBetween('orders.created_at', [$request->from, $request->to])->where('orders.status', self::DONE)->get();
                break;
            default:
                return response()->json(['error' => 'Invalid filterby value' . $request->filterby], Response::HTTP_BAD_REQUEST);
        }

        return response()->json($render_data);
    }
}