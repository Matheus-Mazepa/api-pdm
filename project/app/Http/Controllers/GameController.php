<?php

namespace App\Http\Controllers;


use App\Model\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function getAllGames()
    {
        return Game::all();
    }

    public function store(Request $request)
    {
        $data = $request->all();
    }
}
