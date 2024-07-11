<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerOrderContoller extends Controller
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    public function index()
    {
        $user_id = auth()->user()->id;

        $render_data = [
            'orders' => DB::table('orders')
                ->join('cakes', 'orders.cake_id', 'cakes.id')
                ->select('orders.*', 'cakes.*', 'orders.id AS order_id', 'orders.created_at AS order_date', 'orders.status AS order_status')
                ->where('orders.user_id', $user_id)
                ->where('cakes.status', self::ACTIVE)
                ->get()
        ];

        return view('main.pages.customer.orders.orders', $render_data);
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $payment = $request->cakePrice * $request->order;

        $formData = [
            'cake_id' => $request->cakeId,
            'user_id' => $user_id,
            'orders' => $request->order,
            'payment' => $payment,
        ];

        Order::create($formData);

        return response()->json([
            'response' => 1,
            'message' => 'Your order is successfull.',
            'path' => '/customer/cakes'
        ]);
    }

    public function edit(string $id)
    {
        $data = Order::find($id);
        return response()->json($data);
    }

    public function update(Request $request, string $id)
    {
        $user_id = auth()->user()->id;
        $payment = $request->cakePrice * $request->order;

        $formData = [
            'cake_id' => $request->cakeId,
            'user_id' => $user_id,
            'orders' => $request->order,
            'payment' => $payment,
        ];

        Order::where('id', $id)->update($formData);

        return response()->json([
            'response' => 1,
            'message' => 'Your order is successfully updated.',
            'path' => '/customer/orders'
        ]);
    }

    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();

        return response()->json([
            'response' => 1,
            'message' => 'Your order is successfully deleted.',
            'path' => '/customer/orders'
        ]);
    }
}
