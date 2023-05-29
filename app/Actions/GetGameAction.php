<?php
namespace App\Actions;

use App\Models\Game;

class GetGameAction
{
    public function execute(int $id): Game
    {
        $game = Game::findOrFail($id);

        return $game;
    }
}