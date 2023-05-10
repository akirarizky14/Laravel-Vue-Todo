<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// import Item from Models
use App\Models\Item;
// Carbon for timestamp
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Item::orderBy('created_at','DESC')->get();
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
    public function store(Request $request)
    {
        //
        $newItem = new Item;
        $newItem-> name = $request->name;
        $newItem->save();
        return $newItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $existingItem = Item::find($id);

        if ($existingItem) {
            $existingItem->name = $request->input('name');
            $existingItem->save();
    
            return response()->json($existingItem);
        }
    
        return response()->json('Item not found', 404);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existingitem = Item::find($id);
        if($existingitem){
            $existingitem->delete();
            return 'Item Successfully deleted';
        }
        return 'Item not found';
    }
}
