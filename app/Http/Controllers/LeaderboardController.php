<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\Trainee;

class LeaderboardController extends Controller
{
    public function show ($projectId = null) {

        if ($projectId == null) {
            $project = Project::first();
        } else {
            $project = Project::find($projectId);
        }

        $projects = Project::all();

        if (!$project) {
            abort(404, 'Project not found');
        }

        $tasks = $project->task()->get();

        $trainees = Trainee::all()->sortByDesc('total_score');

        $scores = Trainee::join('task_trainee', 'trainees.uuid', '=', 'task_trainee.trainee_uuid')
                ->join('tasks', 'task_trainee.task_uuid', '=', 'tasks.uuid')
                ->select('trainees.uuid as trainee_uuid', 'tasks.uuid as task_uuid', 'task_trainee.score')
                ->get();

        return view('leaderboard', compact('tasks', 'project', 'trainees', 'scores', 'projects'));
    }


}
