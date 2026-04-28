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
        return response()->json($id);
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

    public function recent(Request $request)
    {
        $seconds = $request->integer('window', 1800);

        $activity = ActivityRecord::query()
            ->where('created_at', '>=', now()->subSeconds($seconds))
            ->select('user_id')
            ->selectRaw('SUM(activity_score) as total_activity')
            ->groupBy('user_id')
            ->get();

        return response()->json($activity);
    }
}
