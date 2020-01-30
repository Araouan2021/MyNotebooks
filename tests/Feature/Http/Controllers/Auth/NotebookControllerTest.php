<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotebookControllerTest.php extends TestCase
{
    use RefreshDatabase;

    public function index()
    {
        $response = $this->get(route('notebooks'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.notebooks');
    }
    
}
