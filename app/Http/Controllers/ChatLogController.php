<?php

namespace App\Http\Controllers;

use App\Models\ChatLog;
use Illuminate\Http\Request;

class ChatLogController extends Controller
{
    public function index()
    {
        $objects = ChatLog::all();

        return response()->json($objects);
    }

    public function show(ChatLog $id)
    {
        return response()->json($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $chatLog = $request->user()->chatLogs()->create($validated);

        return response()->json($chatLog, 201);
    }
}
