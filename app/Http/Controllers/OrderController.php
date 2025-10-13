<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $rows = Order::where('user_id', $id)
        ->join('order_product', 'orders.id', '=', 'order_product.order_id')
        ->join('products', 'order_product.product_id', '=', 'products.id')
        ->select(
            'orders.id as order_id',
            'orders.total_price', 
            'orders.payment_method', 
            'orders.shipping_method', 
            'orders.status as order_status', 
            'order_product.quantity'
        )
        ->get();

        $orders = [];

        foreach($rows as $row) {
            $order_id = $row->order_id;

            if (!isset($orders[$order_id])) {
                $orders[$order_id] = [
                    'id' => $order_id,
                    'total_price' => $row->total_price,
                    'order_code' => $row->order_code,
                    'payment_method' => $row-> payment_method,
                    'shipping_method' => $row->shipping_method,
                    'status' => $row->order_status,
                    'quantity' => $row->quantity,
                    'products' => []
                ];
            }

            $orders[$order_id]['products'][] = [
                ''
            ];
        }

        return ['data' => array_values($orders)];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
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
