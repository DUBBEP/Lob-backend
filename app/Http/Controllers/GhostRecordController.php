<?php

namespace App\Http\Controllers;

use App\Models\GhostRecord;
use Illuminate\Http\Request;

class GhostRecordController extends Controller
{
    public function index()
    {
        $objects = GhostRecord::all();

        return response()->json($objects);
    }

    public function show(GhostRecord $id)
    {
        return response()->json($id);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'actions'  => 'required|array',
            'duration' => 'required|numeric',
        ]);

        $ghostRecord = $request->user()->ghostRecords()->create($validated);

        return response()->json($ghostRecord, 201);
    }
}
