<?php

namespace Database\Factories;

use App\Models\Materia;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Materia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // Le ponemos unique() para que no se repita la materia
        return [
            'nombre' => $this->faker->unique()->randomElement(array ('Diseño en Interfaces Web','Desarrollo en Entorno Servidor','Desarrollo en Entorno Cliente', 'Lenguaje de Marcas', 'Despliegue de Aplicaciones Web')),
        ];
    }
}
