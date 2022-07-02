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
        DB::table("proposal")->insert([
            "id" => 1,
            "job_id" => 1,
            "bid" => 730,
            "proposal_text" => "I'm happy to work with you if you allow me",
            "created_time" => date("Y-m-d H:i:s"),
            // "created_at" => date("Y-m-d H:i:s"),
            // "updated_at" => date("Y-m-d H:i:s"),
            "freelancer_id" => 1,
        ]);    
    }
}
