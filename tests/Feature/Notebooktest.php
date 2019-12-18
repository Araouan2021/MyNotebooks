<?php

namespace Tests\Feature;

use App\Notebook;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class Notebooktest extends TestCase
{
    public function testsNotebooksAreCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'heading' => 'Lorem',
            'description' => 'Ipsum',
            'date' => 'Lorem'
        ];

        $this->json('POST', '/api/notebooks', $payload, $headers)
            ->assertStatus(200)
            ->assertJson([ 'id' => 1, 'heading' => 'Lorem', 'description' => 'Ipsum',  'date' => 'Lorem']);
    }

    public function testsNotebooksAreUpdatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $notebook = factory(Notebook::class)->create([
            'heading' => 'First Notebook',
            'description' => 'First Description',
            'date' => 'First Date'
        ]);

        $payload = [
            'heading' => 'Lorem',
            'description' => 'Ipsum',
            'date' => 'Lorem'
        ];
        $response = $this->json('PUT', '/api/notebooks/' . $notebook->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([ 'id' => 1, 'heading' => 'Lorem', 'description' => 'Ipsum' , 'date' => 'Lorem']);
    }
    public function testsNotebooksAreDeletedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $notebook = factory(Notebook::class)->create([
            'heading' => 'First Notebook',
            'description' => 'First Description',
            'date' => 'First Date'
        ]);

        $this->json('DELETE', '/api/notebooks/' . $notebook->id, [], $headers)
            ->assertStatus(204);
    }

    public function testNotebooksAreListedCorrectly()
    {
        factory(Notebook::class)->create([
            'heading' => 'First Notebook',
            'description' => 'First Heading',
            'date' => 'First Date'
        ]);

        factory(Notebook::class)->create([
            'heading' => 'Second Notebook',
            'description' => 'Second Heading',
            'date' => 'Second Date'
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/notebooks', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                [ 'heading' => 'First Notebook', 'description' => 'First Description', 'Date' => 'First Date'],
                [ 'heading' => 'Second Notebook', 'description' => 'Second Description', 'Date' => 'Second Date']
            ])
            ->assertJsonStructure([
                '*' => ['id', 'heading', 'description', 'date', 'created_at', 'updated_at'],
            ]);
    }
    
    public function testUserCantAccessNotebooksWithWrongToken()
    {
        factory(Notebook::class)->create();
        $user = factory(User::class)->create([ 'email' => 'user@test.com' ]);
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $user->generateToken();
        $this->json('get', '/api/notebooks', [], $headers)->assertStatus(401);
    }
    public function testUserCantAccessNotebooksWithoutToken()
    {
        factory(Notebook::class)->create();
        $this->json('get', '/api/notebooks')->assertStatus(401);
    }
}
    
