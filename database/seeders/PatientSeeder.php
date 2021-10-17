<?php

namespace Database\Seeders;

use App\Models\Patient;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $gender = $faker->randomElement(['male', 'female']);
        $collection = collect([]);
    
        $entries = 50000;

        for($i = 1; $i <= $entries; $i++) {
            $collection->push([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'gender' => $gender,
                'email' => $faker->unique()->email,
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        
        $chunks = $collection->chunk(1000);
        
         foreach($chunks as $chunk) {
             Patient::insert($chunk->toArray());
         }
    }
}
