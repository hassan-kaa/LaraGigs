<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(10)->create();
        $user = \App\Models\User::factory()->create([
            'name' => 'Hassan admin',
            'role' => 'admin',
            'email' => 'test@email.com',
            'password' => bcrypt('thekaa'), ]);
            

         Listing::factory(10)->create(
            ['user_id' => $user->id]
          );
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
