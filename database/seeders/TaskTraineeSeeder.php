<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trainee;
use App\Models\Task;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TaskTraineeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainee::all()->each(function ($trainee) {
            $tasks = Task::all();

            // $tempTotalScore = 0;

            $tasks->each(function ($task) use ($trainee) {
                $score = rand(0, 100);
                $trainee->task()->attach($task, ['score' => $score]);
                // $tempTotalScore = $tempTotalScore + $score;
            });

            $trainee->load('task');

            $totalScore = $trainee->task->sum('pivot.score');
            $trainee->update(['total_score' => $totalScore]);

        });
    }
}

// cara counter ni error gimana tolonggggggggg
// count(): Argument #1 ($value) must be of type Countable|array, string given
// php artisan migrate:fresh --seed
