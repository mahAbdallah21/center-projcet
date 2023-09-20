<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\Manager;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com'
        ]);
        $this->call([
            UesrSeeder::class,
            CategorySeeder::class
        ]);
          \App\Models\User::factory(500)->create();
          \App\Models\Employee::factory(500)->create();
          \App\Models\company::factory(500)->create();
          \App\Models\Manager::factory(500)->create();
          \App\Models\branch::factory(500)->create();
          \App\Models\ClassRoom::factory(500)->create();
          \App\Models\Vendor::factory(500)->create();
          \App\Models\Course::factory(500)->create();

          \App\Models\Post::factory(500)->create();


          foreach(range(1,500) as $num){

            Employee::find($num)->update(['user_id'=> $num]);
            Manager::find($num)->update(['company_id'=> $num]);

          }
    }
}
