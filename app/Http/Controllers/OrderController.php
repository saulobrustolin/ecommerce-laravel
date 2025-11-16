<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $orders = Order::where('user_id', $id)
            ->with([
                'product:id,name,short_description',
            ])
            ->get();

        // carregar size e color do pivot
        $orders->each(function ($order) {
            $order->product->each(function ($product) {
                $product->pivot->load([
                    'size:id,name',
                    'color:id,name'
                ]);
            });
        });

        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $user = $request->get('user');

        $r = DB::select('SELECT transformarPedido(:user)', [$user]);

        return $r;
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
