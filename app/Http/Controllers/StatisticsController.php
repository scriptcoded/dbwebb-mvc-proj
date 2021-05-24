<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class StatisticsController extends BaseController
{
    public function index(Request $request)
    {
        return view('statistics');
    }
}
