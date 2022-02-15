<?php

namespace Database\Seeders;

use App\Models\FormData;
use App\Models\LastRun;
use App\Models\Meeting;
use App\Models\Race;
use App\Models\Runner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if (config('app.env') != 'production') {
            $this->seedData();
        }

    }

    public function seedData()
    {
        //clear already data
        Meeting::truncate();
        Race::truncate();
        Runner::truncate();
        FormData::truncate();
        LastRun::truncate();

        //insert some dummy data
        Meeting::factory(10)->create();
        Race::factory(10)->create();
        Runner::factory(10)->create();
        FormData::factory(10)->create();
        LastRun::factory(10)->create();
    }
}
