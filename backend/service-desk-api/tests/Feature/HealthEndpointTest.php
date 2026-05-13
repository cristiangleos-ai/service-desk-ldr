<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthEndpointTest extends TestCase
{
    public function test_health_endpoint_returns_successful_response(): void
    {
        $response = $this->getJson('/api/health');

        $response->assertStatus(200);

        $response->assertJson([
            'status' => 'ok',
            'message' => 'Service Desk API is running',
            'service' => 'service-desk-ldr',
            'version' => '1.0.0',
        ]);
    }
}