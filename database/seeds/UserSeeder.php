<?php

use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstName' => 'John ',
            'lastName' => 'Doe',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'avatar'=>'me.jpg',
            'role_id' => 1,
            'position_id' => 1,
            'department_id' => 1,
        ]);


        User::create(
            [
                'firstName' => 'Wang',
                'lastName' => 'Yu',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user'),
                'role_id' => 2,
                'position_id' => 2,
                'department_id' => 2,
            ]
        );

        User::create(
            [
                'firstName' => 'Jerald',
                'lastName' => 'Lim',
                'email' => 'wamidulim@gmail.com',
                'password' => Hash::make('123456789'),
                'avatar'=>'Lim.jpg',
                'role_id' => 2,
                'position_id' => 3,
                'department_id' => 2,
            ]
        );
        User::create(
            [
                'firstName' => 'Mark David',
                'lastName' => 'Salcedo',
                'email' => 'ichirokoji@yahoo.com',
                'password' => Hash::make('123456789'),
                'avatar'=>'David.jpg',
                'role_id' => 2,
                'position_id' => 7,
                'department_id' => 2,
            ]
        );
        User::create(
            [
                'firstName' => 'Karla',
                'lastName' => 'Guia',
                'email' => 'karlaguia@yahoo.com',
                'password' => Hash::make('123456789'),
                'avatar'=>'Karla.jpg',
                'role_id' => 2,
                'position_id' => 9,
                'department_id' => 2,
            ]
        );
        User::create(
            [
                'firstName' => 'Russel',
                'lastName' => 'Faulmino',
                'email' => 'russelfaulmino11@gmail.com',
                'password' => Hash::make('123456789'),
                'avatar'=>'Russel.png',
                'role_id' => 2,
                'position_id' => 5,
                'department_id' => 2,
            ]
        );
        User::create(
            [
                'firstName' => 'Ronvince',
                'lastName' => 'Siman',
                'email' => 'mansisiman6@gmail.com',
                'password' => Hash::make('123456789'),
                'avatar'=>'Siman.jpg',
                'role_id' => 2,
                'position_id' => 10,
                'department_id' => 2,
            ]
        );





        
        User::create(
            [
                'firstName' => 'Jane',
                'lastName' => 'Doe',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('user'),
                'role_id' => 2,
                'position_id' => 11,
                'department_id' => 3,
            ]
        );
    }
}
