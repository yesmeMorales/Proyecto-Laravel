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
        //Load data with a sql query
        // DB::insert('INSERT INTO professions(title) VALUES (:title)', [
        //     'title' => 'Desarrollador back-end'
        // ]);

        //Load data with the laravel generator
        // DB::table('professions')->insert([
        //     'title' => 'Desarrollador back-end',
        // ]);

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
        
        //Load random data with the factorie model
        factory(Profession::class, 17)->create();
    }
}
