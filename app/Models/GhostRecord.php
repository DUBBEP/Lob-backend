<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GhostRecord extends Model
{
    /** @use HasFactory<\Database\Factories\GhostRecordFactory> */
    use HasFactory;

    protected $casts = [
        'actions' => 'array',
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
