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
        DB::table("job")->insert(
        [
            "job_id" => 1,
            "job_title" => "Web3 Developer",
            "job_description" => "web3 developer needed with an experience of truffle",
            "id" => 1,
            "is_open" => 1,
            "price" => 78, 
        ],
        
        [
            "job_id" => 2,
            "job_title" => "Mobile App Developer (React Native)",
            "job_description" => "We are looking for a React Native Developer to help build our first iOS and Android mobile applications. You will leverage your experience with React Native and Redux to develop high quality cross-platform mobile apps. Must have at least 2 apps live in the iOS App Store or Google Play Store using React Native. Bachelor's degree in Computer Science or related field preferred. $30-45/hour for an initial 3-month contract with potential to extend long-term. Must be able to start within the next 2 weeks.",
            "id" => 1,
            "is_open" => 1,
            "price" => 35, 
        ],

        [
            "job_id" => 3,
            "job_title" => "Back-End API Developer Job Description:",
            "job_description" => "We need a Back-End Web Developer to build and scale RESTful APIs for our mobile and web applications. You will work primarily with PHP, Python, and/or Node.js to build and integrate API services. Must have experience with API security, versioning, and scaling for high workloads. 5+ years of back-end development experience required, with examples of live APIs you have developed. $40-60/hour position with flexible work hours. Long-term freelance or part-time role available.",
            "id" => 1,
            "is_open" => 1,
            "price" => 58, 
        ],

        );
    }
}
