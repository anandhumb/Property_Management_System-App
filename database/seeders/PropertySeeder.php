<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::create([
            'user_id' => 1,
            'property_name' => 'Villa',
            'status' => 'Approved',
            'upload_image' => '..\public\JHXmAXrBBm0Da3cCqPAJzbgf4GSLIumTICEV7gRT.jpg',
        ]);
    }
}
