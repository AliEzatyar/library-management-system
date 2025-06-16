<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete(); // optional: clear table first

        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('secret'),
            'verification_status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

}
