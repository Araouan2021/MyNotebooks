<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;



class NotebookControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function store_notebooks()
    {
        $response = $this->get(route('notebooks'));

        $response->assertStatus(201);
        $response->assertViewIs('auth.notebooks');
    } 
}
