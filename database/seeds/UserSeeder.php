<?php

use App\User;
use App\Models\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //search for a data in the professions table to relate it to the professions_id field of the users table
        $professionId = Profession::where('title', 'Desarrollador back-end')->value('id');
        //enter a user in the users table
        User::create([
            'name' => 'Yesme Morales',
            'email' => 'yesme@gmail.com',
            'password' => bcrypt('laravel'),
            'profession_id' => $professionId
        ]);
    }
}
