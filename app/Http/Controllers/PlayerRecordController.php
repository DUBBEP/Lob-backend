<?php

namespace App\Http\Controllers;

use App\Models\PlayerRecord;
use Illuminate\Http\Request;

class PlayerRecordController extends Controller
{
    public function index() 
    {
        $objects = PlayerRecord::all();

        return response()->json($objects);
    }

    public function show(PlayerRecord $id)
    {
        return response()->json($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'score'    => 'required|numeric',
        ]);

        $playerRecord = $request->user()->PlayerRecords()->create($validated);

        return response()->json($playerRecord, 201);
    }
}
