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

        $products = Product::where(
            'available', true
        )->where(
            'name', 'ILIKE', "%{$query}%"
        )->with([
            'image:id,url,product_id',
            'size:id,name,product_id',
            'color:id,name,color,product_id',
            'review:id,describe,star,product_id'
        ])
        ->withCount(['review as total_reviews'])
        ->withAvg('review', 'star')
        ->paginate(9)
        ->makeHidden(['quantity']);

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
        $product = $product->with([
            'image:id,url,product_id',
            'size:id,name,product_id',
            'color:id,name,color,product_id',
            'review:id,describe,star,product_id'
        ])
        ->withCount(['review as total_reviews'])
        ->withAvg('review', 'star')
        ->find($product->id)
        ->makeHidden(['quantity']);

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
