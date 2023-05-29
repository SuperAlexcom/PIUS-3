<?php
namespace App\Actions;

use App\Models\Game;

class DeleteGameAction
{
    public function execute(int $id): void
    {
        $game = Game::findOrFail($id);
        $game->delete();
    }
}