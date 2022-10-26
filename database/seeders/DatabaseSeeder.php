<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Etudiants;
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
        //creation des etudiant avec des factory (de faker-api)
        Etudiants::factory(5)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //creation des classes avec des seeder
        // $this->call(ClasseTableSeeder::class);
        //creation des etudiants avec des seeder
        // $this->call(EtudiantsTableSeeder::class);

    }
}
