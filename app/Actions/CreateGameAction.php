<?php 
namespace App\Actions;

use App\Models\Game;

class CreateGameAction
{
    public function execute(array $data): Game
    {
        return Game::create($data);
    }
}