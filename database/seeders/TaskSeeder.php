<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Arr;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $project = Project::inRandomOrder()->get();

        $uuids = $project->pluck('uuid')->toArray();

        for ($i=0; $i < 10; $i++) {
            $randomuuid = Arr::random($uuids);

            $task = new Task([
                'uuid' => $faker->uuid(),
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'project_uuid' => $randomuuid
            ]);

            $task->save();
        }
    }
}
