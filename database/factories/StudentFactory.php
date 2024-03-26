<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class studentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nisn' => $this->faker->randomNumber(6, false),
            'name' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['P', 'W']),
            'tempat_lahir' => $this->faker->city(),
            'tgl_lahir' => $this->faker->date('Y_m_d'),
            'agama' => 'ISLAM',
            'wali' => $this->faker->name(),
            'is_lulus' => 'F',
            'kelas' => $this->faker->randomNumber(),
            'is_active' => 'T',
        ];
    }
}
