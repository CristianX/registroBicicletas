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
            'IDENTIFICACION_USUARIO'-> $this->faker->name();
            'NOMBRES_USUARIO'-> $this->faker->name();
            'APELLIDOS_USUARIO'-> $this->faker->name();
            'EDAD_USUARIO'-> $this->faker->name();
            'EMAIL_USUARIO'-> $this->faker->name();
            'TELFCONVENCIONAL_USUARIO'-> $this->faker->name();
            'TELFCELULAR_USUARIO'-> $this->faker->name();
            'NACIONALIDAD_USUARIO'-> $this->faker->name();
            'PARROQUIARES_USUARIO'-> $this->faker->name();
            'BARRIORES_USUARIO'-> $this->faker->name();
        ];
    }
}
