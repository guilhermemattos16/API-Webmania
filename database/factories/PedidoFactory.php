<?php

namespace Database\Factories;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\NotaFiscal;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cliente_id' => Cliente::factory(),
            'pagamento' => $this->faker->randomElement(array ('0','1')),
            'presenca' => $this->faker->randomDigitNot(6,7,8),
            'modalidade_frete' => $this->faker->randomDigitNot(5,6,7,8),
            'frete' => $this->faker->randomFloat(2, 1, 99),
            'desconto' => $this->faker->randomFloat(2, 1, 15)
        ];
    }
}
