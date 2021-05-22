<x-layout>
    <form method="POST" action="{{ URL::Route('game21.reset') }}">
        @csrf
        <button class="button is-danger" type="submit">Reset game</button>
    </form>
  
    <br>
    
  
    <div class="game21-container">
        @if (!$game->getDiceCount())
            <form method="POST" action="{{ URL::Route('game21.setDice') }}">
                @csrf

                <p class="mb-2">You can place a bet. If you're correct you'll gain an extra win point.</p>

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
            <div class="columns">
                <div class="column">
                    <div class="box">
                        @if ($game->getWinner())
                            <div class="columns">
                                <div class="column">
                                    <h3 class="title is-3">
                                        🧍
                                        {{ $game->getPointsPlayer() }}
                                    </h3>
                                </div>
                                <div class="column">
                                    <h3 class="title is-3">
                                        🖥️
                                        {{ $game->getPointsComputer() }}
                                    </h3>
                                </div>
                            </div>

                            @if ($game->getWinner() === 'player')
                                <h3 class="title is-3">Congratulations! You won!</h3>
                            @elseif ($game->getWinner() === 'computer')
                                <h3 class="title is-3">Oh no! You lost!</h3>
                            @endif
        
                            @if ($game->getPlayerBetWon())
                                <h4 class="title is-4 mb-1">You won your bet!</h4>
                                <p class="mb-4">You've been rewarded with 1 extra win point</p>
                            @endif
        
                            @if ($game->getComputerBetWon())
                                <h4 class="title is-4 mb-1">The computer won their bet!</h4>
                                <p class="mb-4">They've been rewarded with 1 extra win point</p>
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
                            <div class="dice-container mb-4">
                                @foreach ($game->getHand()->getDice() as $dice)
                                    @if ($dice->getLastRoll())
                                        <img
                                            class="dice"
                                            src="{{ URL::asset('img/dice-six-faces-' . $dice->getLastRoll() . '.svg') }}"
                                            alt="Dice roll: {{ $dice->getLastRoll() }}"
                                        >
                                    @endif
                                @endforeach

                                <span class="dice-sum">
                                    <strong>Points:</strong>
                                    {{ $game->getPointsPlayer() }}
                                </span>
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
                    </div>

                    {{-- <h3 class="title is-3">Wins</h3> --}}

                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="score-avatar">
                                    🧍
                                    {{ $game->getWinsPlayer() }}
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="box">
                                <div class="score-avatar">
                                    🖥️
                                    {{ $game->getWinsComputer() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-narrow">
                    <div class="box">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
  </x-layout>