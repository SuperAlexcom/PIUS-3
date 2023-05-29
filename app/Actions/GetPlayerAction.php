<?php
namespace App\Actions;

use App\Models\Player;

class GetPlayerAction
{
    public function execute(int $id): Player
    {
        $player = Player::findOrFail($id);

        return $player;
    }
}