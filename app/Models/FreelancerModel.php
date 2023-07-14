<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerModel extends Model
{
    use HasFactory;

    protected $table = "freelancer";


    public function projectsTakenSoFar()
    {
        $taken_jobs = Hired::where('freelancer_id', $this->freelancer_id)->get();
        return count($taken_jobs);
    }

    public function ongoingProjects()
    {
        $ongoing_projects = Hired::where("freelancer_id", $this->freelancer_id)->where("finished", false)->get();
        return $ongoing_projects;
    }

    public function finishedJobsCount()
    {

        $jobs_got_hired = Hired::where('freelancer_id', $this->freelancer_id)->where("finished", true)->get();
        return count($jobs_got_hired);

    }


    public function proposals(){
        return $this->hasMany(Proposal::class);
    }
}
