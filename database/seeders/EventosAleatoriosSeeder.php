<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventosAleatoriosSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            $vagas = fake()->numberBetween(10, 100);

            DB::table('eventos')->insert([
                'titulo' => fake()->words(3, true),
                'tipo' => fake()->randomElement(['workshop', 'palestra', 'hackathon']),
                'data' => fake()->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
                'local' => fake()->randomElement(['Auditório', 'Laboratório 2.05', 'Sala 3.10']),
                'vagas' => $vagas,
                'inscritos' => fake()->numberBetween(0, $vagas),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
