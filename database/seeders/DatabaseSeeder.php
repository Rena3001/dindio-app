<?php

namespace Database\Seeders;

use App\Models\App;
use App\Models\Domain;
use App\Models\Service;
use App\Models\User;
use App\Models\UserService;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 10 istifadəçi
        User::factory(10)->create();

        // 5 xidmət
        Service::factory(5)->create();

        // Hər istifadəçiyə random 1-3 xidmət
        User::all()->each(function ($user) {
            $services = Service::inRandomOrder()->take(rand(1, 3))->pluck('id');
            foreach ($services as $serviceId) {
                UserService::create([
                    'user_id' => $user->id,
                    'service_id' => $serviceId,
                ]);
            }
        });

        // 15 app
        App::factory(15)->create();

        // 10 domain
        Domain::factory(10)->create();
    }

}
