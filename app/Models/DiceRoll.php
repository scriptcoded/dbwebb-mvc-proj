<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $result
 * @property string $rolled_by
 */
class DiceRoll extends Model
{
    use HasFactory;
}
