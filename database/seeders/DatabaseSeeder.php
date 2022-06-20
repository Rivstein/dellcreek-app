<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
<<<<<<< HEAD
        // \App\Models\Property::factory(1000)->create();
=======
        // \App\Models\Property::factory(100)->create();
>>>>>>> 3e5424e20b856464f4cd35e5c85ec1c29dee8d46
        $this->call([
            PermissionsSeeder::class,
        ]);
    }
}
