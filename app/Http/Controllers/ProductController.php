<?php

namespace App\Http\Controllers;

use App\Models\CollectionProduct;
use App\Models\Product;
use App\Models\Image;
use App\Models\Slugs;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $rows = Product::where('available', true)->get();

        $products = [];

        foreach ($rows as $row) {
            $images = Image::where('product_id', $row->id)
            ->select('id', 'url')
            ->get();

            $slugs = Slugs::where('product_id', $row->id)
            ->select('id', 'name', 'color')
            ->get();

            $products[] = [
                'id' => $row->id,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
                'name' => $row->name,
                'available' => $row->available,
                'short_description' => $row->short_description,
                'description' => $row->description,
                'price' => $row->price,
                'images' => $images,
                'slugs' => $slugs
            ];
        }

        return ['data' => $products];
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
