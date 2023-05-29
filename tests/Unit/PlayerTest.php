<?php
use App\Models\Player;
use Illuminate\Support\Arr;
uses(Tests\TestCase::class);

test('create player',function() {
    $attributes = Player::factory()->raw();
    $response = $this->postJson('/api/v1/players',$attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('players',Arr::except($attributes,['remember_token']));
});
test('get player', function () {
    $player = Player::factory()->create();

    $response = $this->getJson("/api/v1/players/{$player->id}");

    $data = [
        'data' => [
            'id' => $player->id,
            'name' => $player->name,
            'password' => $player->password,
            'email' => $player->email,
            'remember_token' => $player->remember_token,
            'created_at' => $player->created_at->format('Y-m-d\TH:i:s.u\Z'),
            'updated_at' => $player->updated_at->format('Y-m-d\TH:i:s.u\Z')
        ],
    ];

    $response->assertStatus(200)->assertJson($data);
});
test('put player', function () {
    $player = Player::factory()->create();
    $updatedPlayer = ['name' => 'Updated Player Name',
                      'email' => 'updatedEmsailfas427@mail.ru',
                      'password' => 'newPassword'];
    $response = $this->putJson("/api/v1/players/{$player->id}", $updatedPlayer);
    $response->assertStatus(200);
    $this->assertDatabaseHas('players', $updatedPlayer);
});

test('patch player', function () {
    $player = Player::factory()->create();
    $updatedPlayer = ['name' => 'Updated Player Name',
                      'email' => 'updatedEsmail2fs6@mail.ru',
                      'password' => 'newPassword'];
    $response = $this->patchJson("/api/v1/players/{$player->id}", $updatedPlayer);
    $response->assertStatus(200);
    $this->assertDatabaseHas('players', $updatedPlayer);
});
test('delete player', function () {
    $player = Player::factory()->create();
    $response = $this->deleteJson("/api/v1/players/{$player->id}");
    $response->assertStatus(204);
});

