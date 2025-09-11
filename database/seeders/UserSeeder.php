<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::create([
            'first_name' => 'Omar',
            'last_name' => 'Samy',
            'email' => 'osamy8088@gmail.com',
            'password' => '12345678',
            'phone' => '01019631989',
            'lang' => 'en',
            'type' => 'admin'
        ]);
        $user->addRole('super_admin');

        // $user->addRole('super_admin');
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'password' => fake()->password(),
                'lang' => 'en',
                'type' => fake()->randomElement(['admin', 'user']),
            ]);
        }
    }
}
