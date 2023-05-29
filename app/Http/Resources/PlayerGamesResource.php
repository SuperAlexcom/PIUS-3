<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Actions\Player\CreatePlayerAction;
use App\Actions\Player\DeletePlayerAction;
use App\Actions\Player\UpdatePlayerAction;
class PlayerGamesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'genre' => $this->genre,
        ];
    }
}
