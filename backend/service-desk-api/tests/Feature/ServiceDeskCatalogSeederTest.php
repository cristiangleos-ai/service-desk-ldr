<?php

namespace Tests\Feature;

use Database\Seeders\ServiceDeskCatalogSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceDeskCatalogSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_service_desk_catalog_seeder_creates_base_catalog(): void
    {
        $this->seed(ServiceDeskCatalogSeeder::class);

        $this->assertDatabaseHas('areas', [
            'slug' => 'tecnologias-de-la-informacion',
        ]);

        $this->assertDatabaseHas('areas', [
            'slug' => 'servicios-generales',
        ]);

        $this->assertDatabaseHas('categories', [
            'slug' => 'programas-software',
        ]);

        $this->assertDatabaseHas('categories', [
            'slug' => 'equipo-de-computo',
        ]);

        $this->assertDatabaseHas('subcategories', [
            'slug' => 'correo',
        ]);

        $this->assertDatabaseHas('subcategories', [
            'slug' => 'laptop',
        ]);

        $this->assertDatabaseHas('subcategories', [
            'slug' => 'red-wifi',
        ]);

        $this->assertDatabaseHas('subcategories', [
            'slug' => 'tracking-released-units',
        ]);
    }
}