<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'max_players',
        'description',
        'its_free',
        'price',
        'game_category_id',
        'address_id',
        'responsible_user_id',
        'title',
        'date',
        'start_time',
        'end_time',
    ];

    protected $dates = ['date'];

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


    public function getDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])->format('d/m/Y');
    }
}
