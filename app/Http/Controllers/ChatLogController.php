<?php

namespace App\Http\Controllers;

use App\Models\ChatLog;
use Illuminate\Http\Request;

class ChatLogController extends Controller
{
    public function index()
    {
        $object = ChatLog::all();

        return respone()->json($objects);
    }

    public function show(ChatLog $id)
    {
        $record = ChatLog::findOrFail($id);
        return respone()->json($record);
    }

    public function store(Request $request)
    {
        $valudated = $request->validate([
            'username' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $chatLog = $required->user()->chatLog()->create($valudated);

        return response()->json($chatLog, 201);
    }
}
