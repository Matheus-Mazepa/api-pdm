<?php

namespace App\Model;

class Game
{
    protected $fillable = [
        'max_players',
        'description',
        'its_free',
        'price',
        'address_id',
        'responsible_user_id',
        'date',
        'start_time',
        'end_time',
    ];

    public function address()
    {
        return $this->belongsTo('App\Model\Address');
    }

    public function responsibleUser()
    {
        return $this->belongsTo('App\User', 'responsible_user_id');
    }

    public function gameCategory()
    {
        return $this->belongsTo('App\Model\GameCategory');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_game', 'game_id', 'user_id');
    }
}
