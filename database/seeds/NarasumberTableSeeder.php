<?php

use Illuminate\Database\Seeder;

use App\Narasumber;

class NarasumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $narasumbers = [
            [
                'username' => 'narasumber',
                'email' => 'narasumber@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'narasumber'
            ],
            [
                'username' => 'narasumberprem',
                'email' => 'narasumberprem@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'narasumberprem'
            ]
        ];

        foreach ($narasumbers as $narasumber) {
            Narasumber::create($narasumber);
        }
    }
}
