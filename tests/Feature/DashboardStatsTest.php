<?php

namespace Tests\Feature;

use Tests\TestCase;

class DashboardStatsTest extends TestCase
{
    /**
     * Test the dashboard stats API.
     *
     * @return void
     */
    public function test_dashboard_stats_api()
    {
        // API sorğusunu göndəririk
        $response = $this->getJson('/api/dashboard-stats');

        // API-nin düzgün cavab verdiyini yoxlayırıq
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'servicesCount',
                     'usersCount',
                     'userServicesCount',
                     'appsCount',
                     'domainsCount',
                     'adminsCount',
                 ]);
    }
}
