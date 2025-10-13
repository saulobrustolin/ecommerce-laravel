<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = DB::table('collections')
            ->join('collection_product', 'collections.id', '=', 'collection_product.collection_id')
            ->join('products', 'products.id', '=', 'collection_product.product_id')
            ->where('products.available', '=', true)
            ->select(
                'products.id as product_id',
                'products.name as product_name',
                'products.short_description',
                'products.description',
                'products.price',
                'collections.id as collection_id',
                'collections.name as collection_name'
            )
            ->get();
        
        $collections = [];

        foreach($rows as $row) {
            $collectionId = $row->collection_id;

            if (!isset($collections[$collectionId])) {
                $collections[$collectionId] = [
                    'id' => $collectionId,
                    'name' => $row->collection_name,
                    'products' => []
                ];
            }

            $collections[$collectionId]['products'][] = [
                'id' => $row->product_id,
                'name' => $row->product_name,
                'short_description' => $row->short_description,
                'description' => $row->description,
                'price' => $row->price
            ];
        }

        return [ 'data' => array_values($collections) ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollectionRequest $request)
    {
        $collection = Collection::create($request->all());
        return ["message" => "Êxito ao criar coleção.", "id" => $collection->id];
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        $collections = DB::table('collections')
        ->join('products', 'collections.id', '=', 'products.id')
        ->select('products.*', 'collections.name')
        ->where('collections.id', $collection->id)
        ->get();

        return ["id" => $collection->id, "name" => $collection->name, "products" => $collections];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollectionRequest $request, Collection $collection)
    {
        $collection->update($request->all());
        return ["message" => "Êxito ao atualizar coleção."];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();
        return ["message" => "Êxito ao excluir coleção."];
    }
}
