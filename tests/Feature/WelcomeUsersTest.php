<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeUsersTest extends TestCase
{
    /** @test */
    function it_welcomes_users_with_nickname()
    {
        
        $this->get('/saludo/yesme/chesmin')
            ->assertStatus(200)
            ->assertSee('Bienvenido Yesme, tu apodo es chesmin');
    }
    /** @test */
    function it_welcomes_users_without_nickname()
    {
        $this->get('/saludo/yesme')
            ->assertStatus(200)
            ->assertSee('Bienvenido Yesme');
    }   
}
