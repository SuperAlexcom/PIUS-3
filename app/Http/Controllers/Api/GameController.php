<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use Illuminate\Http\Response;
use App\Models\Game;
use App\Http\Resources\GameResource;
use App\Actions\CreateGameAction;
use App\Actions\UpdateGameAction;
use App\Actions\DeleteGameAction;
use App\Actions\GetGameAction;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GameResource::collection(Game::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameRequest $request, CreateGameAction $createGameAction)
    {
        $createdGame = $createGameAction->execute($request->validated());

        return new GameResource($createdGame);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id,GetGameAction $action)
    {
        $game = new GameResource($action->execute($id));
        return $game;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GameRequest $request, int $id, UpdateGameAction $updateGameAction)
    {
        $updatedGame = $updateGameAction->execute($id, $request->validated());

        return new GameResource($updatedGame);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, DeleteGameAction $deleteGameAction)
    {
        $deleteGameAction->execute($id);
        
        return response(null, Response::HTTP_NO_CONTENT);
    }
    
    public function put(int $id, GameRequest $request, UpdateGameAction $action) : GameResource
    {
        return new GameResource($action->execute($id,$request->validated()));
    }
}