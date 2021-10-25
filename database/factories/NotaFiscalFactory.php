<?php

namespace Database\Factories;

use App\Models\NotaFiscal;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotaFiscalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NotaFiscal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'operacao' => $this->faker->randomElement(array ('0','1')),
            'natureza_operacao' => $this->faker->word(),
            'modelo' => $this->faker->randomElement(array ('1','2')),
            'finalidade' => $this->faker->randomElement(array ('1','4')),
            'ambiente' => $this->faker->randomElement(array ('1','2')),
            'pedido_id' => 1
        ];
    }
}
