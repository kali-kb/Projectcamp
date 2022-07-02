<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class FreelancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("freelancer")->insert([
            "name" => "Marcus Jamie",
            "email" => "marcus@jamie.com",
            "password" => Hash::make("123456"),
            "location" => "Spain",
            "total_spent" => 0
        ]);
    }
}
