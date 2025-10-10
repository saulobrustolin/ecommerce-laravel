<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;

use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = DB::table('collections')
            ->join('products', 'collections.id', '=', 'products.id')
            ->select('products.*', 'collections.name')
            ->get();
        return $collections;
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
