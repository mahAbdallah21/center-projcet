<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\type;

class UesrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'name' => 'mahmoud Abdallah',
            'email'=> 'admin@mail.com',
            'password'=>Hash::make('123456789'),
            'type' =>'admin'
        ]);
    }
}
