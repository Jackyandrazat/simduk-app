<?php

namespace Database\Factories;

use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warga>
 */
class WargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Warga::class;

    public function definition()
    {
        return [
            'nik' => $this->faker->unique()->numerify('###############'), // Generate 16-digit unique random number
            'nama' => $this->faker->name,
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date('Y-m-d'),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'pendidikan' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'pekerjaan' => $this->faker->jobTitle,
            'alamat' => $this->faker->address,
            'status' => $this->faker->randomElement(['Lajang', 'Menikah', 'Cerai', 'Duda', 'Janda']),
            'status_kk' => $this->faker->randomElement(['Suami', 'Istri', 'Anak', 'Saudara']),
            'usia' => $this->faker->numberBetween(0, 100),
            'status_tempat_tngl' => $this->faker->randomElement(['Tetap', 'Kontrak']),
            'status_kependudukan' => $this->faker->randomElement(['Baru', 'Lama']),
            'RW' => $this->faker->numberBetween(1, 6),
            'RT' => $this->faker->numberBetween(1, 6),
        ];
    }

}
