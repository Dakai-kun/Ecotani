<?php

namespace Database\Seeders;

use App\Models\UserPreference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $preferences = [
            [
                'value' => 'Plastik',
                'user_id' => 1
            ],
            [
                'value' => 'Organik',
                'user_id' => 2
            ],
            [
                'value' => 'Kertas',
                'user_id' => 3
            ],
        ];

        foreach ($preferences as $preference) {
            UserPreference::create($preference);
        }
    }
}
