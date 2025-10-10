<?php

namespace App\Http\Controllers;

use App\Models\CollectionProduct;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        $collection_product = CollectionProduct::create([
            "status" => true,
            "collection_id" => $request->collection,
            "product_id" => $product->id
        ]);

        return ["message" => "Êxito ao criar produto.", "id" => $product->id];
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return ["message" => "Êxito ao atualizar o produto."];
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return ['mensagem' => 'Êxito ao remover produto.'];
    }
}
