<x-layout>
    <h1 class="title is-1">Game 21</h1>
  
    <form method="POST" action="{{ URL::Route('game21.reset') }}">
        @csrf
        <button class="button is-danger" type="submit">Reset</button>
    </form>
  
    <br>
  
  
    @if (!$game->getDiceCount())
        <form method="POST" action="{{ URL::Route('game21.setDice') }}">
            @csrf

            <div class="field">
                <div class="control">
                    <input
                        class="input bet-input"
                        type="number"
                        name="bet"
                        placeholder="Your bet"
                        required
                        min="1"
                        max="21"
                        autofocus
                    >
                </div>
            </div>
            
            <button class="button is-link" type="submit" name="dice" value="1">Play with 1 dice</button>
            <button class="button is-link" type="submit" name="dice" value="2">Play with 2 dice</button>
        </form>
    @else
        <table class="table">
            <tbody>
                <tr>
                    <th>Bet player</th>
                    <td>
                        {{ $game->getBetPlayer() }}
                    </td>
                </tr>
                <tr>
                    <th>Bet computer</th>
                    <td>
                        {{ $game->getBetComputer() }}
                    </td>
                </tr>
                <tr>
                    <th>Points player</th>
                    <td>
                        {{ $game->getPointsPlayer() }}
                    </td>
                </tr>
                <tr>
                    <th>Points computer</th>
                    <td>
                        {{ $game->getPointsComputer() }}
                    </td>
                </tr>
                <tr>
                    <th>Wins player</th>
                    <td>
                        {{ $game->getWinsPlayer() }}
                    </td>
                </tr>
                <tr>
                    <th>Wins computer</th>
                    <td>
                        {{ $game->getWinsComputer() }}
                    </td>
                </tr>
            </tbody>
        </table>
  
        @if ($game->getWinner())
            @if ($game->getWinner() === 'player')
                <h3 class="title is-3">Congratulations! You won!</h3>
            @elseif ($game->getWinner() === 'computer')
                <h3 class="title is-3">Oh no! You lost!</h3>
            @endif
  
            <p class="mb-2">You can place a bet for the next round. If you're correct you'll gain an extra win point.</p>
  
            <form method="POST" action="{{ URL::Route('game21.nextRound') }}" class="mb-4">
                @csrf
  
                <div class="field has-addons">
                    <div class="control">
                        <input
                            class="input bet-input"
                            type="number"
                            name="bet"
                            placeholder="Your bet"
                            required
                            min="1"
                            max="21"
                            autofocus
                        >
                    </div>
                    <div class="control">
                        <button class="button is-link" type="submit">Next round</button>
                    </div>
                </div>
            </form>
  
            <p class="mb-2">If you've finished playing you can save your score to the leader board. This will also reset your score.</p>
  
            <form method="POST" action="{{ URL::Route('game21.saveScore') }}">
                @csrf
  
                <div class="field has-addons">
                    <div class="control">
                        <input
                            class="input"
                            type="text"
                            name="name"
                            placeholder="Your name"
                            required
                        >
                    </div>
                    <div class="control">
                        <button class="button is-link" type="submit">Save highscore</button>
                    </div>
                </div>
            </form>
        @else
            <div class="is-clearfix mb-4">
                @foreach ($game->getHand()->getDice() as $dice)
                    <pre class="game21-dice">{!! $dice->render() !!}</pre>
                @endforeach
            </div>
  
            <div>
                <form class="is-inline" method="POST" action="{{ URL::Route('game21.roll') }}">
                    @csrf
                    <button class="button is-link" type="submit">Roll</button>
                </form>
                <form class="is-inline" method="POST" action="{{ URL::Route('game21.stop') }}">
                    @csrf
                    <button class="button is-success" type="submit">Stop</button>
                </form>
            </div>
        @endif
    @endif
  </x-layout>