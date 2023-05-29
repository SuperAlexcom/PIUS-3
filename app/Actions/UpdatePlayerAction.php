<?php
namespace App\Actions;

use App\Models\Player;

class UpdatePlayerAction
{
    public function execute(int $id, array $data): Player
    {
        $player = Player::findOrFail($id);
        $player->update($data);
        return $player;
    }
}