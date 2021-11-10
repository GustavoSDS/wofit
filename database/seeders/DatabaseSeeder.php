<?php

namespace Database\Seeders;

use App\Models\Boxe;
use App\Models\Preinscripcion_fecha;
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
        $this->call(UserSeeder::class);
        Boxe::factory(10)->create();
        Preinscripcion_fecha::factory(5)->create();
    }
}
