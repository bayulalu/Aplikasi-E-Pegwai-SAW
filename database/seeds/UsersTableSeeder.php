<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'nip' => 123,
            'name'  => str_random(20),
            'user'  => 'bayu'.str_random(5),
            'password'  => bcrypt('123456'),
            'sector' => 'admin',
            'foto' => '',
            'eslon' => 1,
            'group1' => 'satu',
            'group2' => 'dua'
        ]);
        // for ($i=0; $i <20 ; $i++) { 
        //      \App\Models\User::create([
        //         'nip' => 123.$i,
        //         'name'  => str_random(20),
        //         'user'  => str_random(5),
        //         'password'  => bcrypt('123'),
        //         'sector' => 'Skertaris',
        //         'foto' => '',
        //         'eslon' => 3,
        //         'group1' => 'Skertaris',
        //         'group2' => 
        //     ]);
        }
    }

