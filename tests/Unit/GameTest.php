<?php
use App\Models\Game;
use Illuminate\Support\Arr;
uses(Tests\TestCase::class);

test('create game',function() {
    $attributes = Game::factory()->raw();
    $response = $this->postJson('/api/v1/games',$attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('games', $attributes);
});
test('get game', function () {
    $game = Game::factory()->create();

    $response = $this->getJson("/api/v1/games/{$game->id}");

    $data = [
        'data' => [
            'id' => $game->id,
            'title' => $game->title,
            'description' => $game->description,
            'genre' => $game->genre,
            'created_at' => $game->created_at->format('Y-m-d\TH:i:s.u\Z'),
            'updated_at' => $game->updated_at->format('Y-m-d\TH:i:s.u\Z')
        ],
    ];

    $response->assertStatus(200)->assertJson($data);
});
test('put game', function () {
    $game = Game::factory()->create();
    $updatedGame = ['title' => 'Updated Game title',
                      'description' => 'new description',
                      'genre' => 'new genre'];
    $response = $this->putJson("/api/v1/games/{$game->id}", $updatedGame);
    $response->assertStatus(200);
    $this->assertDatabaseHas('games', $updatedGame);
});

test('patch game', function () {
    $game = Game::factory()->create();
    $updatedGame = ['title' => 'Updated Game title2',
                      'description' => 'new description2',
                      'genre' => 'new genre2'];
    $response = $this->putJson("/api/v1/games/{$game->id}", $updatedGame);
    $response->assertStatus(200);
    $this->assertDatabaseHas('games', $updatedGame);
});

test('delete game', function () {
    $game = Game::factory()->create();
    $response = $this->deleteJson("/api/v1/players/{$game->id}");
    $response->assertStatus(204);
});

