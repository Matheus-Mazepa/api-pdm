<?php

use App\Model\GameCategory;
use Illuminate\Database\Seeder;

class PopulateTableGamesCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GameCategory::create(
            [
                'name' => 'Voleibol',
            ]
        );
        GameCategory::create(
            [
                'name' => 'Futebol',
            ]
        );
        GameCategory::create(
            [
                'name' => 'Futevôlei',
            ]
        );
        GameCategory::create(
            [
                'name' => 'Tênis',
            ]
        );
        GameCategory::create(
            [
                'name' => 'Tênis de mesa',
            ]
        );
        GameCategory::create(
            [
                'name' => 'Basquetebol',
            ]
        );
    }
}
