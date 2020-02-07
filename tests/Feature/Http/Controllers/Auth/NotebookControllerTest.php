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
       $response->assertSeeText("Codetrain");
    }
}
