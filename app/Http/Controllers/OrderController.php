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
                'product.image:id,url,product_id',
                'user:name,id',
                'address:*'
            ])
            ->get();

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
        $address = $request->get('address');

        $r = DB::select('SELECT transformarPedido(:user, :address)', [$user, $address]);

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
        if ($order->getAttribute('tracking_code') !== null) {
            return response()->json(400, 'Não foi possível alterar o endereço do seu pedido, pois ele já está a caminho com a transportadora.');
        }

        $order->address_id = $request->get('address_id');
        $order->save();

        return [];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        if ($order->getAttribute('tracking_code') !== null) {
            return response()->json([
                'erro' => 'Pedido já está com a transportadora, então não é possível fazer o cancelamento.',
                'input' => $order->getAttribute('tracking_code')
            ], 400);
        }

        $order->update([
            'status' => 'Cancelado'
        ]);
        $order->save();
        return [];
    }
}
