<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KeterlambatanGurus>
 */
class KeterlambatanGurusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacher_id' => $this->faker->randomDigitNotNull(),
            'jab_id' => $this->faker->randomDigitNotNull(),
            'tanggal' => $this->faker->dateTime(),
            'keterangan' => $this->faker->words(5, true),
        ];
    }
}
