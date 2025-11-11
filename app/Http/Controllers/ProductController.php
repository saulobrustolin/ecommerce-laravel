<?php

namespace App\Http\Controllers;

use App\Models\CollectionProduct;
use App\Models\Product;
use App\Models\Image;
use App\Models\Slugs;
use App\Models\Review;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('search');

        $rows = Product::where(
            'available', true
        )->where(
            'name', 'ILIKE', "%{$query}%"
        )->get();

        $products = [];

        foreach ($rows as $row) {
            $images = Image::where('product_id', $row->id)
            ->select('id', 'url')
            ->get();

            $slugs = Slugs::where('product_id', $row->id)
            ->select('id', 'name', 'color')
            ->get();

            $reviews = Review::where('product_id', $row->id)
            ->select('id', 'describe', 'star')
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
                'slugs' => $slugs,
                'reviews' => $reviews
            ];
        }

        return ['data' => $products, 'query' => $query];
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
        $images = Image::where(
            'product_id', $product->id
        )->get();

        $reviews = Review::where(
            'product_id', $product->id
        )
        ->select('id', 'describe', 'star')
        ->get();

        $sizes = $product->slugs->pluck('sizes.name');

        $value = 0;
        if (count($reviews) > 0) {
            foreach ($reviews as $row) {
                $value += $row->star;
            }
            $value = $value / count($reviews);
        }

        return ['data' => [...$product->toArray(), 'sizes' => $sizes], 'images' => $images, 'reviews' => $reviews, 'star' => $value, 'product' => $product];
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
