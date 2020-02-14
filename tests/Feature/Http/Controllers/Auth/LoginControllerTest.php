<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{   
    use AuthenticatesUsers;

    use RefreshDatabase;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    /** @test */

    public function login()
    {
        $response = $this->post('/api/login')[$user=$this->guard()->user()]

<?php
    
    