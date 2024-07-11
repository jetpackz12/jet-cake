<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerCakeContoller extends Controller
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    public function index()
    {
        $render_data = [
            'cakes' => Cake::where('status', self::ACTIVE)->paginate(6)
        ];

        return view('main.pages.customer.cakes.cakes', $render_data);
    }

    public function search(Request $request)
    {

        $render_data = [
            'cakes' => DB::table('cakes')->where('status', self::ACTIVE)
                ->where(function ($query) use ($request) {
                    $query->where('cakename', 'like', '%' . $request->search . '%')
                        ->orWhere('flavor', 'like', '%' . $request->search . '%')
                        ->orWhere('description', 'like', '%' . $request->search . '%')
                        ->orWhere('price', 'like', '%' . $request->search . '%');
                })
                ->paginate(6)
        ];

        return view('main.pages.customer.cakes.cakes', $render_data);
    }
}
