<?php
namespace App\Actions;

use App\Models\Game;

class UpdateGameAction
{
    public function execute(int $id, array $data): Game
    {
        $game = Game::findOrFail($id);
        $game->update($data);
        return $game;
    }
}