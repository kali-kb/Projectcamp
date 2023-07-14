<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("proposal")->insert(

        [
            "id" => 1,
            "job_id" => 2,
            "bid" => 54,
            "proposal_text" => "I'm happy to work with you if you allow me",
            "created_time" => now(),
            "freelancer_id" => 1,
        ],

        [
            "id" => 2,
            "job_id" => 2,
            "bid" => 50,
            "proposal_text" => "I have a react experience",
            "created_time" => now(),
            "freelancer_id" => 2,
        ],

    );    
    }
}
