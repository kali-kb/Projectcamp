<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("client")->insert([
            "name" => "Javier Alvez",
            "email" => "kbpro2121@gmail.com",
            "password" => Hash::make("123456"),
            "location" => "Spain",
            "total_spent" => 0
        ]);
    }
}
