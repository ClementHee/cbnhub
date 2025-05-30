<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 
       Season::create([
            'id' => 1,
            'name' => 'Season 1',
            'description' => 'This is the first season.',
            'order' => 1,
        ]);
        Season::create([
            'id' => 2,
            'name' => 'Season 2',
            'description' => 'This is the second season.',
            'order' => 2,
        ]);
        Season::create([
            'id' => 3,
            'name' => 'Season 3',
            'description' => 'This is the third season.',
            'order' => 3,
        ]);
        Season::create([
            'id' => 4,
            'name' => 'Season 4',
            'description' => 'This is the fourth season.',
            'order' => 4,
        ]);
        Season::create([
            'id' => 5,
            'name' => 'Season 5',
            'description' => 'This is the fifth season.',
            'order' => 5,
        ]);
  

        for ($i = 1; $i <= 9; $i++) {
            \App\Models\Course::create([
               
                'id' => '10' . $i,
                'name' => 'Episode ' . $i,
                'description' => 'This is the episode ' . $i . ' of S1.',
                'order' => $i,
                'season_id' => 1,
            ]);
        }

        for ($i = 1; $i <= 9; $i++) {
            \App\Models\Course::create([
                'id' => '20' . $i,
                'name' => 'Episode ' . $i,
                'description' => 'This is the episode ' . $i . ' of S2.',
                'order' => $i,
                'season_id' => 2,
            ]);
        }

        for ($i = 1; $i <= 9; $i++) {
            \App\Models\Course::create([
                'id' => '30' . $i,
                'name' => 'Episode ' . $i,
                'description' => 'This is the episode ' . $i . ' of S3.',
                'order' => $i,
                'season_id' => 3,
            ]);
        }

        for ($i = 1; $i <= 9; $i++) {
            \App\Models\Course::create([
                'id' => '40' . $i,
                'name' => 'Episode ' . $i,
                'description' => 'This is the episode ' . $i . ' of S4.',
                'order' => $i,
                'season_id' => 4,
            ]);
        }

        for ($i = 1; $i <= 9; $i++) {
            \App\Models\Course::create([
                'id' => '50' . $i,
                'name' => 'Episode ' . $i,
                'description' => 'This is the episode ' . $i . ' of S5.',
                'order' => $i,
                'season_id' => 5,
            ]);
        }

        for ($i = 10; $i <= 12; $i++) {
            \App\Models\Course::create([
                'id' => '1' . $i,
                'name' => 'Episode ' . $i,
                'description' => 'This is the episode ' . $i . ' of S1.',
                'order' => $i,
                'season_id' => 1,
            ]);
        }

        for ($i = 10; $i <= 12; $i++) {
            \App\Models\Course::create([
                'id' => '2' . $i,
                'name' => 'Episode ' . $i,
                'description' => 'This is the episode ' . $i . ' of S2.',
                'order' => $i,
                'season_id' => 2,
            ]);
        }

        for ($i = 10; $i <= 12; $i++) {
            \App\Models\Course::create([
                'id' => '3' . $i,
                'name' => 'Episode ' . $i,
                'description' => 'This is the episode ' . $i . ' of S3.',
                'order' => $i,
                'season_id' => 3,
            ]);
        }

        for ($i = 10; $i <= 12; $i++) {
            \App\Models\Course::create([
                'id' => '4' . $i,
                'name' => 'Episode ' . $i,
                'description' => 'This is the episode ' . $i . ' of S4.',
                'order' => $i,
                'season_id' => 4,
            ]);
        }

        for ($i = 10; $i <= 12; $i++) {
            \App\Models\Course::create([
                'id' => '5' . $i,
                'name' => 'Episode ' . $i,
                'description' => 'This is the episode ' . $i . ' of S5.',
                'order' => $i,
                'season_id' => 5,
            ]);
        }
        

       
    }
}
