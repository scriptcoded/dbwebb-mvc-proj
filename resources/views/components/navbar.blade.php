<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ URL::Route('home') }}">
      mvc-v1
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button {{ Route::is('home') ? 'is-primary' : 'is-text' }}" href="{{ URL::Route('home') }}">
            Home
          </a>
          <a class="button {{ Route::is('game21') ? 'is-primary' : 'is-text' }}" href="{{ URL::Route('game21') }}">
            Game 21
          </a>
          <a class="button {{ Route::is('highscores') ? 'is-primary' : 'is-text' }}" href="{{ URL::Route('highscores') }}">
            Highscores
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
