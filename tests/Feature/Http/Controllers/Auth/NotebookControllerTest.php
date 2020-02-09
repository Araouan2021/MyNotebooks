<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Notebook;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;



class NotebookControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function store_notebooks()
    {
        $response = $this->post('/api/notebooks',[
            'heading'=>'Awesome note',
            'description'=>'tttttt',
            'date'=>'22nd nov 2030'
            ]);

        $response->assertStatus(201);
        $response->assertJson([
            'heading'=>'Awesome note',
            'description'=>'tttttt',
            'date'=>'22nd nov 2030'
            ]);
    }

    public function test_homepage()
    {
       $response = $this->get('/');
       $response->assertViewIs('welcome');
       $response->assertSeeText("Laravel");
    }

    public function update()
    {
        $response = $this->post('/api/notebooks',[
            'heading'=>'Errands',
            'description'=>'shopping',
            'date'=>'groceries'
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'heading'=>'Errands',
            'description'=>'shopping',
            'date'=>'groceries'
            ]);
    }

    public function delete()
    {
        $response = $this->delete('/api/notebooks');
        $response->assertStatus(204);
    }

    public function index()
    {
        $response = $this->get('/api/notebooks');
        $response->assertViewIs();
    }

    public function show()
    {
        $response = $this->get('/api/notebooks');
        $response->assertViewIs();
    }


}
