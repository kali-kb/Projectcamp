<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobModel;
use Illuminate\Support\Facades\DB;


class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("job")->insert([
            "job_id" => 1,
            "job_title" => "Blockchain Developer",
            "job_description" => "I need a blockchain developer",
            "id" => 1,
            "is_open" => 1,
            "price" => 500, 

        ]);
        // JobModel::factory()->count(10)->create();
    }
}
