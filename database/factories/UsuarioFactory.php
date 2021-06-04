<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'IDENTIFICACION_USUARIO'=> $this->faker->numberBetween(0, 10000000000),
            'NOMBRES_USUARIO'=> $this->faker->sentence(2),
            'APELLIDOS_USUARIO'=> $this->faker->sentence(2),
            'EDAD_USUARIO'=> $this->faker->numberBetween(1, 125),
            'EMAIL_USUARIO'=> $this->faker->sentence(1),
            'TELFCONVENCIONAL_USUARIO'=> $this->faker->numberBetween(0, 10000000000),
            'TELFCELULAR_USUARIO'=> $this->faker->numberBetween(0, 10000000000),
            'NACIONALIDAD_USUARIO'=> $this->faker->sentence(1),
            'PARROQUIARES_USUARIO'=> $this->faker->sentence(2),
            'BARRIORES_USUARIO'=> $this->faker->sentence(2),
        ];
    }
}
