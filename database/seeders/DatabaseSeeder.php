<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'User 1',
            'email' => 'example1@gmail.com',
            'password' => bcrypt('example1'),
        ]);
        Customer::insert([
            [
                'first_name' => 'John',
                'surname' => 'Smith',
                'email' => 'johnsmith@gmail.com',
                'phone_number' => '07745064085',
                'first_line' => '7 London Road',
                'second_line' => 'Flat 2',
                'city'=> 'Brighton',
                'postcode' => 'BN3 5TH',
            ],
            [
                'first_name' => 'Alice',
                'surname' => 'Brown',
                'email' => 'alicebrown@gmail.com',
                'phone_number' => '0161 345 678',
                'first_line' => '54 Oxford Street',
                'second_line'=> '',
                'city'=> 'Manchester',
                'postcode' => 'M1 3FG',
            ],
        ]);
    }
}
