<?php 
namespace App\Actions;

use App\Models\Player;

class CreatePlayerAction
{
    public function execute(array $data): Player
    {
        return Player::create($data);
    }
}