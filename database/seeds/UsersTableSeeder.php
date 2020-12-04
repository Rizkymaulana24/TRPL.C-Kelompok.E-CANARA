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
                'password' => Hash::make('admin'),
                'role' => 'admin'
            ],
            [
                'username' => 'narasumber',
                'email' => 'narasumber@gmail.com',
                'password' => Hash::make('narasumber'),
                'role' => 'narasumber'
            ],
            [
                'username' => 'penyelenggara',
                'email' => 'penyelenggara@gmail.com',
                'password' => Hash::make('penyelenggara'),
                'role' => 'penyelenggara'
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        factory(User::class, 4)->create();
    }
}
