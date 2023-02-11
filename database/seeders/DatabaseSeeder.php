<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\TypeUserSeeder;
use Database\Seeders\SpecialistSeeder;
use Database\Seeders\ConsultationSeeder;
use Database\Seeders\ConfigPaymentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TypeUserSeeder::class,
            SpecialistSeeder::class,
            ConsultationSeeder::class,
            ConfigPaymentSeeder::class,
        ]);
    }
}
