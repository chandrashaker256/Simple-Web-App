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
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            ['name' => 'Admin',
            'usertype' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')], 
            [
                'name' => 'Test',
                'usertype' => 'user',
                'email' => 'test@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Demo',
                'usertype' => 'user',
                'email' => 'demo@gmail.com',
                'password' => bcrypt('password')
            ]
        ]);
    }
}
