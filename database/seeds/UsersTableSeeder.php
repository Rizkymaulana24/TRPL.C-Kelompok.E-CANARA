<?php

use Illuminate\Database\Seeder;

use App\User;

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
                'username' => 'Admin',
                'email' => 'Admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin'
            ],
            [
                'username' => 'narasumber',
                'email' => 'narasumber@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'narasumber'
            ],
            [
                'username' => 'penyelenggara',
                'email' => 'penyelenggara@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'penyelenggara'
            ],
            [
                'username' => 'narasumberprem',
                'email' => 'narasumberprem@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'narasumberprem'
            ],
            [
                'username' => 'penyelenggaraprem',
                'email' => 'penyelenggaraprem@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'penyelenggaraprem'
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
