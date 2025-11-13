<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    public function store(StoreCartRequest $request)
    {
        $cart = Cart::create($request->all());

        $products = Cart::where('id', $cart->id)
        ->with([
            'product:id,name,available,price,short_description',
            'product.image:id,url,product_id'
        ])
        ->get()
        ->makeHidden(['user_id', 'product_id']);

        return $cart;
    }

    public function show($user)
    {
        $products = Cart::where('user_id', $user)
        ->with([
            'product:id,name,available,price,short_description',
            'product.image:id,url,product_id'
        ])
        ->get()
        ->makeHidden(['user_id', 'product_id']);

        return $products;
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return ['mensagem' => 'Sucesso ao remover item.'];
    }

    public function update(Cart $cart, UpdateCartRequest $request)
    {
        $cart->update([
            'quantity' => $request->get('quantity')
        ]);

        return ['mensagem' => 'Sucesso ao alterar a quantidade de produtos do carrinho.'];
    }
}
