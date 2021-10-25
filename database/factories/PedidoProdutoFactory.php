<?php

namespace Database\Factories;

use App\Models\PedidoProduto;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PedidoProduto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Produto::factory()->create(),
            'pedido_id' => Pedido::factory()->create()
        ];
    }
}
