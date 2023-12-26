{{-- <label for="leaderboardSelect">Select Project: </label> --}}
<select onchange="navigateToSelected()" id="leaderboardSelect">
    <option value="">Choose Project</option>
@foreach ($projects as $projectnav)
            <option value="{{route('leaderboard.show', $projectnav->uuid)}}">{{$projectnav->name}}</option>
            {{-- <h2><a href="/leaderboard/{{ $projectnav->uuid }}" action="{{route('leaderboard.show', $projectnav->uuid)}}">{{$projectnav->uuid}}</a></h2> --}}
@endforeach
</select>

<script>
    function navigateToSelected() {
        var selectedUrl = $('#leaderboardSelect').val();

        window.location.href = selectedUrl;
    }
</script>
