<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'text',
                'input_type' => 'text',
                'validations' => json_encode([
                    'sometimes',
                    'nullable',
                ]),
            ],
            [
                'name' => 'email',
                'input_type' => 'email',
                'validations' => json_encode([
                    'sometimes',
                    'nullable',
                    'email',
                ]),
            ],

            [
                'name' => 'url',
                'input_type' => 'url',
                'validations' => json_encode([
                    'sometimes',
                    'nullable',
                    'url',
                ]),
            ],

            [
                'name' => 'number',
                'input_type' => 'number',
                'validations' => json_encode([
                    'sometimes',
                    'nullable',
                    'numeric',
                ]),
            ],

            [
                'name' => 'date',
                'input_type' => 'date',
                'validations' => json_encode([
                    'sometimes',
                    'nullable',
                    'date',
                ]),
            ],

            [
                'name' => 'select',
                'input_type' => 'select',
                'validations' => json_encode([
                    'sometimes',
                    'nullable',
                ]),
                'is_selectable' => true,
            ],
        ];

        foreach ($types as $type) {
            Type::updateOrCreate(
                [
                    'name' => $type['name'],
                ],
                $type
            );
        }
    }
}
