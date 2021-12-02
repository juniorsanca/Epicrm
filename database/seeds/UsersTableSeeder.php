<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'       => 1,
                'name'     => 'ADMIN',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('password'),
            ]
        ];

        User::insert($users);
    }
}
