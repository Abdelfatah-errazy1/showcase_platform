<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'errazy.abdelfatah@gmail.com',
            'password' => bcrypt('@abdou1234567'),
            'is_admin' => 1,
        ]);
       
      $this->call([
        CategorySeeder::class,
        TagSeeder::class,
        TechnologySeeder::class,
    ]);
    $this->call(ProjectSeeder::class);
;

}
}
