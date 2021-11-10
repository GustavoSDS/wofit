<?php

namespace Database\Factories;

use App\Models\Boxe;
use App\Models\Preinscripcion_fecha;
use Illuminate\Database\Eloquent\Factories\Factory;

class Preinscripcion_fechaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Preinscripcion_fecha::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dia' => random_int(1, 31),
            'mes' => random_int(1, 12),
            'ano' => $this->faker->year(),
            'nombre' => $this->faker->monthName(),
            'box_id' => random_int(1, 10),
        ];
    }
}
