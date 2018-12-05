<?php

namespace App\Http\Controllers;


use App\Model\Address;
use App\Model\Game;
use App\Model\GameCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function getAllGames()
    {
        return response()->json([
            'games' => Game::with('gameCategory', 'address')->get()
        ], 200);
    }

    public function show($id)
    {
        return response()->json([
            'game' => Game::whereId($id)->first()
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'max_players',
            'description',
            'its_free',
            'price',
            'game_category',
            'responsible_user_id',
            'date',
            'start_time',
            'end_time',
        ]);
        $game = new Game();
        $address = new Address();
        $gameCategory = (new GameCategory())->where('name', $data['game_category'])->first();
        $address = $address->create( $request->only([ 'street', 'district', 'city', 'state',]));
        $data['start_time'] = Carbon::createFromTimeString($data['start_time']);
        $data['end_time'] = Carbon::createFromTimeString($data['end_time']);
        $data['date'] = Carbon::createFromFormat('Y-m-d', $data['date']);
        $data['address_id'] = $address->id;
        $data['game_category_id'] = $gameCategory->id;
        unset($data['game_category']);
        unset($data['street']);
        unset($data['city']);
        unset($data['state']);
        unset($data['district']);
        $game->create($data);
    }
}
