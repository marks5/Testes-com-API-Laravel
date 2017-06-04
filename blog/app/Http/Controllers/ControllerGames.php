<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerGames extends Controller
{
    public function getGames()
    {
        return \App\Games::all();
    }
}
