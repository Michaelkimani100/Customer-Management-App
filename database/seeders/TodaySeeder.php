<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Today;
use Illuminate\Support\Str;

class TodaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=\Faker\Factory::create();
        for($i=0; $i<5 ; $i++ ){
            Today::create([
                'completed' => false,
                'approved' => false,
                'title' => Str::random(12),
                'taskId' => Str::random(10),

            ]);

        }
    }
}
