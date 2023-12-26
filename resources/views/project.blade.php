
    <h1>{{$project->name}}</h1>
    <table class="leaderboard-container">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Trainee</th>
                <th>Task Score</th>
                <th>Total Score</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp

            @foreach ($trainees as $trainee)
                <tr>
                    @php
                        $total_score_per_trainee = 0;
                    @endphp
                    <td>{{ $i++ }}</td>
                    <td>{{ $trainee->uuid }}</td>
                    <td>
                        <select id="taskDetail">
                            <option value="">Task Detail</option>
                            @foreach ($tasks as $task)
                                @php
                                    $task_score = $scores->where('trainee_uuid', $trainee->uuid)->where('task_uuid', $task->uuid)->first()->score
                                @endphp
                                <option> {{$task->name}} - {{$task_score}} </option>
                                @php
                                    $total_score_per_trainee += $task_score;
                                @endphp
                            @endforeach
                        </select>
                    </td>
                    <td>
                        {{ $total_score_per_trainee }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
