```
Set up session

Prompt the user for dice count

:roll:

Prompt the user for a bet

Roll the dice

Add the rolled dice sum to the current total

Did the player get 21 points? {
  The player wins the round
} else {
  Did the player get more than 21 points? {
    The computer wins the round
  } else {
    Player chooses: Roll again or stop

    Roll again: {
      goto roll
    }

    Stop: {
      goto computer-rolls
    }
  }
}

:computer-rolls:

Did the computer get 21 points? {
  The computer wins the round
} else {
  Did the computer get more than 21 points? {
    The player wins the round
  } else {
    Does the computer have more than the player? {
      The computer wins the round
    } else {
      goto computer-rolls
    }
  }
}

Did the player get the betted points? {
  Add one win point to the player
}

Did the computer get the betted points? {
  Add one win point to the computer
}

Player chooses: New round or quit and add to scoreboard

New round {
  goto :roll:
}

Add to scoreboard {
  Add the player and computer score to the scoreboard
}
```
