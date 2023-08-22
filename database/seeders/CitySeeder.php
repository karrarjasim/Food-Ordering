<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = ['Aalborg', 'Aarhus', 'Aba', 'Abeokuta', 'Abovyan', 'Abuja', 'Accra', 'Adana', '...', 'Zaria', 'Zenica', 'Zhodzina', 'Zilina', 'Zvolen', 'Zürich', 'Other'];
 
        foreach ($cities as $city) {
            City::create(['name' => $city]);
        }
    }
}
