<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Delete users and professions tables before loading data
        $this->truncateTables([
            'users',
            'professions'
        ]);
        //dd(ProfessionSeeder::class); print the name of the seeder in console
        // $this->call(UsersTableSeeder::class);
        //call the seeders to load the data in the tables
        $this->call(ProfessionSeeder::class);
        $this->call(UserSeeder::class);
    }

    protected function truncateTables(array $tables){
        //Sentencia sql que se ejecutará en la base de datos
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table){
            DB::table($table)->truncate();
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
