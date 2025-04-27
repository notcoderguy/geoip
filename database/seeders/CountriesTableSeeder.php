<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure the file path matches where your JSON data is stored
        $jsonPath = database_path('data/lang-currency.json');

        // Read the JSON data from the file
        $jsonData = json_decode(file_get_contents($jsonPath), true);

        // Insert each country data into the database
        foreach ($jsonData as $item) {
            Country::create([
                'code' => $item['code'],
                'currency' => json_encode($item['currency']),
                'language' => json_encode($item['language']),
            ]);
        }
    }
}
