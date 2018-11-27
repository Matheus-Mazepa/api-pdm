<?php

namespace App\Http\Controllers;


use App\Model\Address;
use App\Model\Game;
use App\Model\GameCategory;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function getAllGames()
    {
        return Game::all();
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'max_players',
            'description',
            'its_free',
            'price',
            'responsible_user_id',
            'date',
            'start_time',
            'end_time',
        ]);
        $game = new Game();
        $address = new Address();
        $gameCategory = (new GameCategory())->where('name', $data['game_category'])->first();
        $address = $address->create( $request->only([ 'street', 'district', 'city', 'state',]));
        $data['address_id'] = $address->id;
        $data['game_category_id'] = $gameCategory->id;
        $game->create($data);
    }
}
