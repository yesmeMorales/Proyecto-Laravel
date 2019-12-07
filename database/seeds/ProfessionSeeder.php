<?php

use App\Models\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //Ingresar datos con una consulta sql
        // DB::insert('INSERT INTO professions(title) VALUES (:title)', [
        //     'title' => 'Desarrollador back-end'
        // ]);

        //Ingresar datos con el generador de laravel
        // DB::table('professions')->insert([
        //     'title' => 'Desarrollador back-end',
        // ]);

        //Ingresar datos con un modelo
        //load data in the professions table with a model
        Profession::create([
            'title' => 'Desarrollador back-end',
        ]);

        Profession::create([
            'title' => 'Desarrollador front-end',
        ]);

        Profession::create([
            'title' => 'Diseñador web',
        ]);

        // DB::table('professions')->insert([
        //     'title' => 'Desarrollador front-end',
        // ]);

        // DB::table('professions')->insert([
        //     'title' => 'Diseñador web',
        // ]);
    }
}
