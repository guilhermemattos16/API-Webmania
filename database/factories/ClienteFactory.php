<?php

namespace Database\Factories;

use App\Models\Cliente;
use Nette\Utils\Random;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf' => $this->faker->cpf(false),
            'nome_completo' => $this->faker->name(),
            'endereco' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'bairro' => $this->faker->citySuffix(),
            'cidade' => $this->faker->city(),
            'uf' => $this->faker->stateAbbr(),
            'cep' => $this->faker->postcode(),
            'telefone' => $this->faker->phone(),
            'email' => $this->faker->safeEmail(),
        ];
    }
}
