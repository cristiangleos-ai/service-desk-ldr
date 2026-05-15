<?php

namespace Tests\Feature;

use App\Models\Area;
use App\Models\Category;
use App\Models\Subcategory;
use Database\Seeders\ServiceDeskCatalogSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketCreationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @group ticket-creation
     */
    public function test_user_can_create_ticket_with_valid_data(): void
    {
        $this->seed(ServiceDeskCatalogSeeder::class);

        $area = Area::where('slug', 'tecnologias-de-la-informacion')->firstOrFail();

        $category = Category::where('area_id', $area->id)
            ->where('slug', 'equipo-de-computo')
            ->firstOrFail();

        $subcategory = Subcategory::where('category_id', $category->id)
            ->where('slug', 'laptop')
            ->firstOrFail();

        $payload = [
            'area_id' => $area->id,
            'category_id' => $category->id,
            'subcategory_id' => $subcategory->id,
            'title' => 'Laptop no enciende',
            'description' => 'El usuario reporta que su laptop no enciende al iniciar la jornada.',
        ];

        $response = $this->postJson('/api/tickets', $payload);

        $response->assertStatus(201);

        $response->assertJsonPath('data.title', 'Laptop no enciende');
        $response->assertJsonPath('data.status', 'new');
        $response->assertJsonPath('data.priority', 'medium');

        $this->assertDatabaseHas('tickets', [
            'area_id' => $area->id,
            'category_id' => $category->id,
            'subcategory_id' => $subcategory->id,
            'title' => 'Laptop no enciende',
            'description' => 'El usuario reporta que su laptop no enciende al iniciar la jornada.',
            'status' => 'new',
            'priority' => 'medium',
        ]);
    }
}
