<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->sentence(),
            'ISBN' => $this->faker->isbn10(),
            'dataPublicacao' => $this->faker->date(),
            'numeroPaginas' => $this->faker->numberBetween(100,500),
            'seccao' => $this->faker->word(),
            'foto' => $this->faker->sentence(),
            'descricao' => $this->faker->sentence(15), 
        ];
    }
}
