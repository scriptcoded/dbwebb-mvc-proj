<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Game21Controller;
use App\Http\Controllers\HighscoreController;
use App\Http\Controllers\StatisticsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Game21Controller::class, 'index'])->name('game21');
Route::post('/reset', [Game21Controller::class, 'reset'])->name('game21.reset');
Route::post('/set-dice', [Game21Controller::class, 'setDice'])->name('game21.setDice');
Route::post('/set-dice', [Game21Controller::class, 'setDice'])->name('game21.setDice');
Route::post('/next-round', [Game21Controller::class, 'nextRound'])->name('game21.nextRound');
Route::post('/roll', [Game21Controller::class, 'roll'])->name('game21.roll');
Route::post('/stop', [Game21Controller::class, 'stop'])->name('game21.stop');
Route::post('/save-score', [Game21Controller::class, 'saveScore'])->name('game21.saveScore');

Route::get('/highscores', [HighscoreController::class, 'index'])->name('highscores');

Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');
