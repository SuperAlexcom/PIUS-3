<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerRequest;
use Illuminate\Http\Response;
use App\Models\Player;
use App\Http\Resources\PlayerResource;
use App\Actions\CreatePlayerAction;
use App\Actions\UpdatePlayerAction;
use App\Actions\DeletePlayerAction;
use App\Actions\GetPlayerAction;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PlayerResource::collection(Player::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerRequest $request, CreatePlayerAction $createPlayerAction)
    {
        $createdPlayer = $createPlayerAction->execute($request->validated());

        return new PlayerResource($createdPlayer);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id,GetPlayerAction $action)
    {
        $player = new PlayerResource($action->execute($id));
        return $player;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlayerRequest $request, int $id, UpdatePlayerAction $updatePlayerAction)
    {
        $updatedPlayer = $updatePlayerAction->execute($id, $request->validated());

        return new PlayerResource($updatedPlayer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, DeletePlayerAction $deletePlayerAction)
    {
        $deletePlayerAction->execute($id);
        
        return response(null, Response::HTTP_NO_CONTENT);
    }
    
    public function put(int $id, PlayerRequest $request, UpdatePlayerAction $action) : PlayerResource
    {
        return new PlayerResource($action->execute($id,$request->validated()));
    }
}