<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class HiredSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("hired")->insert([
            "id" => 1,
            "freelancer_id" => 1,
            "job_id" => 1,
            "finished" => 1,
            "client_id" => 1
        ]);
    }
}
