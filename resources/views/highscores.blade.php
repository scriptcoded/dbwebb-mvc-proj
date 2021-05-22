<x-layout>
    <h1 class="title is-1">Highscores</h1>
    

    <section class="box">
        <h4 class="title is-4">Filter</h4>

        <form method="GET">
            <div class="field-body datetime-input mb-3">
                <div class="field">
                    <label class="label">From</label>
                    <div class="control">
                      <input
                        class="input"
                        type="datetime-local"
                        placeholder="Start date"
                        name="startdate"
                        value="{{ $startDate }}"
                    >
                    </div>
                </div>
            
                <div class="field">
                    <label class="label">To</label>
                    <div class="control">
                        <input
                          class="input"
                          type="datetime-local"
                          placeholder="End date"
                          name="enddate"
                          value="{{ $endDate }}"
                        >
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input
                      class="input"
                      type="text"
                      placeholder="Name"
                      name="name"
                      value="{{ $name }}"
                    >
                </div>
            </div>
    
            <div class="field is-grouped">
                <div class="control">
                  <button
                    type="submit"
                    class="button is-link"
                  >
                      Apply filter
                    </button>
                </div>

                <div class="control">
                    <button
                        type="submit"
                        name="reset"
                        value="true"
                        class="button is-danger"
                    >
                        Reset filter
                    </button>
                </div>
            </div>
        </form>
    </section>

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

            @if (count($highscores) <= 0)
                <tr>
                    <td colspan="6">No results</td>
                </tr>
            @endif
        </tbody>
    </table>
</x-layout>
