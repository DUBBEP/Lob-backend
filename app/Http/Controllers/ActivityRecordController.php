<?php

namespace App\Http\Controllers;

use App\Models\ActivityRecord;
use Illuminate\Http\Request;

class ActivityRecordController extends Controller
{
    public function index()
    {
        $objects = ActivityRecord::all();

        return response()->json($objects);
    }

    public function show(ActivityRecord $id)
    {
        $record = ActivityRecord::findOrFail($id);
        return response()->json($record);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'activity_score' => 'required|numeric',
        ]);

        $activityRecord = $request->user()->activityRecords()->create($validated);

        return response()->json($activityRecord, 201);
    }
}
