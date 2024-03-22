<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TeachersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->randomNumber(5, false),
            'name' => $this->faker->name(),
            'alamat' => $this->faker->city(),
            'kota' => $this->faker->city(),
            'kodepos' => $this->faker->postcode(),
            'jenis_kelamin' => $this->faker->randomElement(['P', 'W']),
            'agama' => 'ISLAM',
            'bank' => 'BCA',
            'rekening' => $this->faker->randomNumber(5, false),
            'no_ktp' => $this->faker->nik(),
            'tgl_masuk' => $this->faker->dateTime(),
            'tgl_keluar' => $this->faker->dateTime(),
            'noHp' => $this->faker->randomNumber(5, false),
            'email' => $this->faker->email(),
            'jab_id' => $this->faker->randomDigit(),
            'status' => 'singel',
            'jumlah_anak' => $this->faker->randomDigit(),
            'is_active' => 'T',
        ];
    }
}
