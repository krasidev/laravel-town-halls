<?php

namespace Database\Seeders;

use App\Models\TownHall;
use Illuminate\Database\Seeder;

class TownHallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/town_halls.csv"), "r");
        $firstline = true;
        $columns = [];
        $townHalls = [];

        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if ($firstline) {
                foreach($data as $key => $value) {
                    $columns[$value] = $key;
                }
				
				$firstline = false;
            } else {
                $townHalls[] = [
                    'abbreviation' => $data[$columns['abbreviation']],
                    'ekatte_num' => $data[$columns['ekatte_num']],
                    'name' => $data[$columns['name']]
                ];
            }
        }

        fclose($csvFile);

        TownHall::insertOrIgnore($townHalls);
    }
}
