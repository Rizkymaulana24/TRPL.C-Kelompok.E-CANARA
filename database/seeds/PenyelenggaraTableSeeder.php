<?php

use Illuminate\Database\Seeder;

use App\Penyelenggara;

class PenyelenggaraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penyelenggaras = [
            [
                'username' => 'penyelenggara',
                'email' => 'penyelenggara@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'penyelenggara'
            ],
            [
                'username' => 'penyelenggaraprem',
                'email' => 'penyelenggaraprem@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'penyelenggaraprem'
            ]
        ];

        foreach ($penyelenggaras as $penyelenggara) {
            Penyelenggara::create($penyelenggara);
        }
    }
}
