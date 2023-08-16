<?php

namespace Database\Factories;

use App\Models\Warga;
use App\Models\Keluarga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keluarga>
 */
class KeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Keluarga::class;
    public function definition()
    {
        $warga=Warga::inRandomOrder()->first();
        return [
            'no_kk' => $this->faker->unique()->numerify('###############'), // Generate 16-digit unique random number
            'nama_keluarga' => $this->faker->name,
            'nik' => $warga ->id,
        ];
    }

}
