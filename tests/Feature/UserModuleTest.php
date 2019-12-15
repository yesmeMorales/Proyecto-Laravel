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
    function it_loads_the_new_users_page(){
        $this->get('/usuarios/nuevo')
            ->assertStatus(200)
            ->assertSee("Crear usuario");
    }

    /** @test */
    function it_displays_a_404_error_if_the_user_is_not_found(){

        $this->get('/usuarios/999')
            ->assertStatus(404)
            ->assertSee("Página no encontrada");
    }

    /** @test */
    function it_creates_a_new_user(){

        //Datos que se pasan por post
        $this->post('/usuarios/crear/',[
            'name' => 'Yesme5',
            'email' => 'morales5@gmail.com',
            'password' => '123456'
        ])->assertRedirect('usuarios');
        //Primer argumento nombre de la tabla, segundo argumento datos esperados a encontrar
        //El metodo assertCredentials no necesita pasarle el nombre de la tabla
        $this->assertCredentials([
            'name' => 'Yesme5',
            'email' => 'morales5@gmail.com',
            'password' => '123456'
        ]);
    }

    /** @test */
    function the_name_is_required(){

        //$this->withoutExceptionHandling();

        //Datos que se pasan por post
        $this->from('usuarios/nuevo')
            ->post('/usuarios/crear/',[
                'name' => '',
                'email' => 'morales@gmail.com',
                'password' => '1234'
        ])->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio']);

        
        //Comprobamos que el usuario no ha sido creado
        $this->assertEquals(0, User::count());
        // $this->assertDatabaseMissing('users', [
        //     'email'=> 'morales@gmail.com'
        // ]);
    
    }

    /** @test */
    function the_email_is_required(){

        //$this->withoutExceptionHandling();

        //Datos que se pasan por post
        $this->from('usuarios/nuevo')
            ->post('/usuarios/crear/',[
                'name' => 'Juana',
                'email' => '',
                'password' => '12349'
        ])->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email' => 'El campo email es obligatorio']);

        
        //Comprobamos que el usuario no ha sido creado
        $this->assertEquals(0, User::count());
        // $this->assertDatabaseMissing('users', [
        //     'email'=> 'morales@gmail.com'
        // ]);
    
    }

    /** @test */
    function the_email_must_be_valid(){

        //$this->withoutExceptionHandling();

        //Datos que se pasan por post
        $this->from('usuarios/nuevo')
            ->post('/usuarios/crear/',[
                'name' => 'Juana2',
                'email' => 'correo-no-valido',
                'password' => '123493'
        ])->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email']);

        
        //Comprobamos que el usuario no ha sido creado
        $this->assertEquals(0, User::count());
        // $this->assertDatabaseMissing('users', [
        //     'email'=> 'morales@gmail.com'
        // ]);
    
    }

    /** @test */
    function the_email_must_be_unique(){

        //$this->withoutExceptionHandling();
        factory(User::class)->create([
            'email' => 'morales@gmail.com'
        ]);

        //Datos que se pasan por post
        $this->from('usuarios/nuevo')
            ->post('/usuarios/crear/',[
                'name' => 'Juana2',
                'email' => 'morales@gmail.com',
                'password' => '123493'
        ])->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['email']);

        
        //Comprobamos que el usuario no ha sido creado
        $this->assertEquals(1, User::count());
        // $this->assertDatabaseMissing('users', [
        //     'email'=> 'morales@gmail.com'
        // ]);
    
    }


    /** @test */
    function the_password_is_required(){

        //$this->withoutExceptionHandling();

        //Datos que se pasan por post
        $this->from('usuarios/nuevo')
            ->post('/usuarios/crear/',[
                'name' => 'Juana',
                'email' => 'ejemploe@gmail.com',
                'password' => ''
        ])->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['password' => 'El campo password es obligatorio']);

        
        //Comprobamos que el usuario no ha sido creado
        $this->assertEquals(0, User::count());
        // $this->assertDatabaseMissing('users', [
        //     'email'=> 'morales@gmail.com'
        // ]);
    
    }
    
    /** @test */
    function the_password_must_has_six_characters(){

        //$this->withoutExceptionHandling();

        //Datos que se pasan por post
        $this->from('usuarios/nuevo')
            ->post('/usuarios/crear/',[
                'name' => 'Juana',
                'email' => 'ejemploe@gmail.com',
                'password' => '123'
        ])->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['password' => 'El password debe tener mas de 6 caracteres']);

        
        //Comprobamos que el usuario no ha sido creado
        $this->assertEquals(0, User::count());
        // $this->assertDatabaseMissing('users', [
        //     'email'=> 'morales@gmail.com'
        // ]);
    
    }

    /** @test */
    function it_loads_the_edit_user_page(){
        $user = factory(User::class)->create();

        //$this->withoutExceptionHandling();

        $this->get("/usuarios/{$user->id}/editar")
            ->assertStatus(200)
            ->assertViewIs('users.edit')
            ->assertSee('Editar usuario')
            ->assertViewHas('user', function ($viewUser) use ($user){
                return $viewUser->id == $user->id;
            });
    }

    /** @test */
    function it_updates_a_user(){

        //$this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        //usamos el metodo put para reemplazar datos
        $this->put("/usuarios/{$user->id}",[
            'name' => 'Juanita6',
            'email' => 'juanita6@gmail.com',
            'password' => '1236'
        ])->assertRedirect("/usuarios/{$user->id}");

        $this->assertCredentials([
            'name' => 'Juanita6',
            'email' => 'juanita6@gmail.com',
            'password' => '1236'
        ]);
    }

    /** @test */
    function the_name_is_required_when_updating_the_user(){

        //$this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        //usamos el metodo put para reemplazar datos
        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}",[
            'name' => '',
            'email' => 'juanita@gmail.com',
            'password' => '123'
        ])->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['name']);
        
        //Comprobamos que no hay un usuario con el mismo correo en la tabla de usuarios
        $this->assertDatabaseMissing('users', ['email' => 'juanita@gmail.com']);
        
    }

    /** @test */
    function the_email_must_be_valid_when_updating_the_user(){

        //$this->withoutExceptionHandling();

        $user = factory(User::class)->create(['name' => 'Nombre inicial']);

        //usamos el metodo put para reemplazar datos
        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}",[
                'name' => 'Nombre actualizado',
                'email' => 'correo-no-valido',
                'password' => '123'
        ])->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['email']);
        
        //Comprobamos que no hay un usuario con el mismo correo en la tabla de usuarios
        $this->assertDatabaseMissing('users', ['name' => 'Juanita']);
    
    }

    /** @test */
    function the_email_must_be_unique_when_updating_the_user(){

        //Dejamos la prueba incompleta porque para este caso queremos que el email pueda ser el mismo
        
        //$this->withoutExceptionHandling();
        factory(User::class)->create([
            'email' => 'existing-email@example.com'
        ]);

        $user = factory(User::class)->create([
            'email' => 'juanita@gmail.com'
        ]);

        //usamos el metodo put para reemplazar datos
        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}",[
                'name' => 'Juanita',
                'email' => 'existing-email@example.com',
                'password' => '123'
        ])->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['email']);
        
        //Comprobamos que no hay un usuario con el mismo correo en la tabla de usuarios
        //$this->assertDatabaseMissing('users', ['name' => 'Juanita']);
    
    }


    /** @test */
    function the_password_is_optional_when_updating_the_user(){

        //$this->withoutExceptionHandling();
        $oldPassword = 'CLAVE_ANTERIOR';

        //Creamos usuario con una contraseña
        $user = factory(User::class)->create([
            'password' => bcrypt($oldPassword)
        ]);

        //usamos el metodo put para reemplazar datos
        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}",[
            'name' => 'Juanita',
            'email' => 'juanita@gmail.com',
            'password' => ''
        ])->assertRedirect("usuarios/{$user->id}"); //detalles del usuario
        
        //Comprobamos hay un usuario con el mismo correo en la tabla de usuarios
        $this->assertCredentials([
            'name' => 'Juanita',
            'email' => 'juanita@gmail.com',
            'password' => $oldPassword  
            //contraseña del usuario no ha cambiado
        ]);
    }

    /** @test */
    function the_users_email_can_stay_the_same_when_updating_the_user(){
        //Test para mantener el mismo email cuando un usuario actualice sus datos

        //$this->withoutExceptionHandling();
        //$oldPassword = 'CLAVE_ANTERIOR';

        //Creamos usuario con una contraseña
        $user = factory(User::class)->create([
            'email' => 'juanita@gmail.com'
        ]);

        //usamos el metodo put para reemplazar datos
        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}",[
            'name' => 'Juanita',
            'email' => 'juanita@gmail.com',
            'password' => '123456'
        ])->assertRedirect("usuarios/{$user->id}"); //detalles del usuario
        
        //Comprobamos hay un usuario con el mismo correo en la tabla de usuarios
        $this->assertDatabaseHas('users',[
            'name' => 'Juanita',
            'email' => 'juanita@gmail.com'

        ]);
    }


    /** @test */
    function it_deletes_a_user(){

        //$this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->delete("usuarios/{$user->id}")
            ->assertRedirect('usuarios');

        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);

        //$this->assertSame(0, User::count());
    }

}
