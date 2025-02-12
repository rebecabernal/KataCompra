<?php

namespace App\Http\Controllers\Api;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller

{

    public function index()
    {
        return response()->json(Items::all(), 200);
    }


    public function store(Request $request) 
    {

        $item = Items::create([
            'name' => $request->name,
        ]);
        $item->save();
        return response()->json($item, 200); 
    }


    public function show(string $id)
    {
        return response()->json(Items::find($id), 200);
    }

    
    public function update(Request $request, string $id)
    {
        $item = Items::find($id);

        $item->update([
            'name' => $request->name,
        ]);
        $item->save();
        return response()->json($item, 200);
    }


    public function destroy(string $id) 
    {
        Items::find($id)->delete();
    }
}


