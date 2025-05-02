<?php

namespace Database\Factories;

use App\Models\UserService;
use App\Models\User;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserServiceFactory extends Factory
{
    protected $model = UserService::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'service_id' => Service::inRandomOrder()->first()?->id ?? Service::factory(),
        ];
    }
}
