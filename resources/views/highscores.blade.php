<x-layout>
    <h1 class="title is-1">Highscores</h1>

    <table class="table">
        <thead>
            <tr>
                <th><abbr title="Position">Pos</abbr></th>
                <th>Name</th>
                <th>Score</th>
                <th>Player points</th>
                <th>Computer points</th>
                <th>Date</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th><abbr title="Position">Pos</abbr></th>
                <th>Name</th>
                <th>Score</th>
                <th>Player points</th>
                <th>Computer points</th>
                <th>Date</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($highscores as $pos => $highscore)
                <tr class="{{ $highscore->id == $highlighted ? 'is-selected' : '' }}">
                    <th>{{ $pos + 1 }}</th>
                    <td>{{ $highscore->name }}</td>
                    <td
                        class="{{
                            $highscore->score > 3
                                ? 'is-success'
                                : (
                                    $highscore->score > 0
                                        ? 'is-warning'
                                        : 'is-danger'
                                )
                        }}"
                    >
                        {{ $highscore->score }}
                    </td>
                    <td>{{ $highscore->player_score }}</td>
                    <td>{{ $highscore->computer_score }}</td>
                    <td>{{ $highscore->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
