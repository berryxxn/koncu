<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Project;
use App\Models\Trainee;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($j=1; $j < 4; $j++) {
            $randomUuid = $faker->uuid;
            $project = new Project (
                [
                    'uuid' => $randomUuid,
                    'name' => $faker->name()
                ]
            );
            $project->save();
        }


    }
}
