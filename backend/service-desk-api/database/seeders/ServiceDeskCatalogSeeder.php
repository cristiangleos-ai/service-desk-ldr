<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceDeskCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            [
                'name' => 'Tecnologías de la Información',
                'slug' => 'tecnologias-de-la-informacion',
                'description' => 'Área responsable de soporte tecnológico, infraestructura, sistemas, redes y plataformas.',
            ],
            [
                'name' => 'Servicios Generales',
                'slug' => 'servicios-generales',
                'description' => 'Área para solicitudes relacionadas con servicios generales.',
            ],
            [
                'name' => 'Recursos Humanos',
                'slug' => 'recursos-humanos',
                'description' => 'Área para solicitudes relacionadas con recursos humanos.',
            ],
            [
                'name' => 'Jurídico',
                'slug' => 'juridico',
                'description' => 'Área para solicitudes relacionadas con temas jurídicos.',
            ],
        ];

        foreach ($areas as $areaData) {
            Area::updateOrCreate(
                ['slug' => $areaData['slug']],
                [
                    'name' => $areaData['name'],
                    'description' => $areaData['description'],
                    'is_active' => true,
                ]
            );
        }

        $itArea = Area::where('slug', 'tecnologias-de-la-informacion')->first();

        $catalog = [
            'Programas / Software' => [
                'Office 365 (Word, Excel, PowerPoint)',
                'Correo',
                'Instalación de programas',
                'Soporte de aplicaciones',
            ],
            'Equipo de cómputo' => [
                'Laptop',
                'PC de escritorio',
                'Impresora',
                'Celular',
                'Periféricos (otros dispositivos)',
            ],
            'Internet' => [
                'Red WiFi',
                'Desbloqueo de sitio web',
                'Red cableada',
            ],
            'Intranet / Plataformas de la empresa' => [
                'Comunicados institucionales',
                'Demos',
                'Flotilla',
                'Inventario de Unidades',
                'Posventa',
                'Training Center',
                'Tracking Released Units',
                'Viáticos',
            ],
        ];

        foreach ($catalog as $categoryName => $subcategories) {
            $category = Category::updateOrCreate(
                [
                    'area_id' => $itArea->id,
                    'slug' => Str::slug($categoryName),
                ],
                [
                    'name' => $categoryName,
                    'description' => 'Categoría base para solicitudes de ' . $categoryName,
                    'is_active' => true,
                ]
            );

            foreach ($subcategories as $subcategoryName) {
                Subcategory::updateOrCreate(
                    [
                        'category_id' => $category->id,
                        'slug' => Str::slug($subcategoryName),
                    ],
                    [
                        'name' => $subcategoryName,
                        'description' => 'Subcategoría base para ' . $subcategoryName,
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}