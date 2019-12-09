<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class UserModuleTest extends TestCase
{
    //trait para ejecutar el refresh en la base de datos de prueba (osea cargar las tablas con las migraciones)antes de ejecutar cada prueba
    use RefreshDatabase;
    /** @test */
    function it_loads_the_users_list(){
        
        factory(User::class)->create([
            'name' => 'Joel'
        ]);

        factory(User::class)->create([
            'name' => 'Ellie'
        ]);

        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Listado de usuarios')
            ->assertSee('Joel')
            ->assertSee('Ellie');
    }

    /** @test */
    function it_shows_a_default_message_if_the_users_list_is_empty(){
        //Ya no necesitamos esta linea porque tenemos el RefreshDatabase
        //DB::table('users')->truncate();

        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados.');
    }

      /** @test */
    function it_displays_the_users_details(){
        $user = factory(User::class)->create([
            'name' => 'Yesme Morales'
        ]);
        
        //Cargamos el id del usuario anterior para que sea dinamico
        $this->get('/usuarios/'.$user->id)
            ->assertStatus(200)
            ->assertSee("Yesme Morales");
    }

    /** @test */
    function it_edit_the_users_details(){
        $this->get('/usuarios/editar/6')
            ->assertStatus(200)
            ->assertSee("Editando usuario: 6");
    }

    /** @test */
    function it_loads_the_new_users_page(){
        $this->get('/usuarios/nuevo')
            ->assertStatus(200)
            ->assertSee("Crear nuevo");
    }

    /** @test */
    function it_displays_a_404_error_if_the_user_is_not_found(){

        $this->get('/usuarios/999')
            ->assertStatus(404)
            ->assertSee("Página no encontrada");
    }

}
