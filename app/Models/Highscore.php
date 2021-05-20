<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property int $player_score
 * @property int $computer_score
 * @property int $id
 */
class Highscore extends Model
{
    use HasFactory;
}
