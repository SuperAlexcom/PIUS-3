<?php
namespace App\Actions;

use App\Models\Player;

class DeletePlayerAction
{
    public function execute(int $id): void
    {
        $player = Player::findOrFail($id);
        $player->delete();
    }
}