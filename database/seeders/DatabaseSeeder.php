<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PlayerRecord;
use App\Models\ActivityRecord;
use App\Models\ChatLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(15)
            // hasOne relationship
            ->has(PlayerRecord::factory()->synced()) 
            
            // You can also vary the count per user
            ->has(ActivityRecord::factory()->count(2)->synced(), 'activityRecords')
            
            // Or just create the relationship with default factory counts
            ->has(ChatLog::factory()->count(2)->synced(), 'chatLogs')
            ->create();
    }
}
