<?php

namespace Database\Factories;

use App\Models\Domain;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DomainFactory extends Factory
{
    protected $model = Domain::class;

    public function definition(): array
    {
        return [
            'domain_name' => $this->faker->unique()->domainName(),
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
