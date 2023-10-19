<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'prenom' => $this->faker->firstName(),
            'nom' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'avatar' => $this->getRandomAvatar(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

    }

    protected function getRandomAvatar()
    {
        $response = Http::get('https://i.pravatar.cc/100');

        if ($response->successful()) {
            $avatarContent = $response->body();

            // Générer un nom de fichier unique pour l'avatar
            $avatarFileName = md5($avatarContent) . '.png';

            // Enregistrer le contenu de l'avatar dans le dossier de stockage
            Storage::disk('public')->put('avatars/' . $avatarFileName, $avatarContent);

            // Retourner l'URL de l'avatar
            return '/storage/avatars/' . $avatarFileName;
        } else {
            return 'images/default.png'; // Avatar par défaut en cas d'erreur
        }
    }



    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
