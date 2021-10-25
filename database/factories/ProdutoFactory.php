<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'ncm' => $this->faker->regexify('[0-9]{8}'),
            'unidade' => $this->faker->randomElement(array ('UN','KG')),
            'origem' => $this->faker->randomDigitNot(9), 
            'valor' => $this->faker->randomFloat(2, 1, 999)
        ];
    }
}
