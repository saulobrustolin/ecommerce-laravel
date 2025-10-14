<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    public function store(StoreCartRequest $request)
    {
        //
    }

    public function show($user)
    {
        $products = Cart::where('user_id', $user)
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->select('products.*', 'carts.id', 'carts.quantity')
        ->get();

        return [
            'data' => $products
        ];
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
