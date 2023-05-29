<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Player;

class PlayerGameSeeder extends Seeder
{
    public function run()
    {
        $games = Game::all();
        $players = Player::all();

        foreach ($games as $game) {
            $game->players()->attach(
                $players->random(rand(1, 5))->pluck('id')->toArray()
            );
        }
    }
}