<?php

namespace Database\Factories;

use App\Models\Boxe;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoxeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Boxe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name('Juan'),
            'email' => $this->faker->unique()->safeEmail(),
            'direccion' => $this->faker->randomElement(['Tabarez 174', 'Juju 123', 'Corrientes 2341']),
            'direccion_altura' => $this->faker->randomElement(['1743', '4223', '2341']),
            'telefono' => $this->faker->randomElement(['174342422', '375633231', '233412321']),
            'created_by' => $this->faker->randomElement(['1', '2', '3']),
       ];
    }
}
