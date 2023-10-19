<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory()->create([
            "prenom" => "James",
            "nom" => "Oger",
            "email" => "jamesoger@hotmail.com"
        ]);

        // Ajout d'utilisateurs fictifs
        \App\Models\User::factory(9)->create();
    }
}
