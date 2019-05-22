<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'     => 'Elite_Admin',
            'email'    => 'admin@elitecopters.com',
            'role'     => User::ROLE_BOOKEE,
            'password' => Hash::make('admin2019'),
        ]);


        User::create([
            'name'     => 'Henry Zobel',
            'email'    => 'henryzobel@gmail.com',
            'role'     => User::ROLE_BOOKER,
            'password' => Hash::make('qwer1234'),
            'contact_no'=>'09172254684'
        ]);

    }
}
