<?php

namespace App\Http\Livewire;

use App\Models\SavedJobs;
use App\Models\JobModel;
use App\Models\FreelancerModel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Helpers\RelativeTimeFormatter;
use App\Models\Proposal;

class JobsComponent extends Component
{

    public $saved = false;
    public $saved_id;

    public function save($project_id){
        //check if project_id exist on saved list
            //if saved remove it
            //else add it
        error_log("dispatched");
        $doesExist = SavedJobs::where("job_id", $project_id)->exists();
        if($doesExist){
            SavedJobs::where("job_id", $project_id)->delete();
            $this->saved = false;
        }
        else{
            $saved_by = FreelancerModel::where("email", session()->get("email"))->select("freelancer_id")->get()->first();
            $saved = new SavedJobs();
            $saved->job_id = $project_id;
            $saved->freelancer_id = $saved_by["freelancer_id"];
            $saved->save();
            $this->saved = true;
            $this->saved_id = $project_id;
        }

    }

    public function render()
    {
        $saved_email = session()->get("email");
        $freelancer = DB::table("freelancer")->where("email", $saved_email)->get()[0];
        $jobs =  JobModel::where("is_open", true)->orderBy("created_date", "asc")->get();
        $proposals = Proposal::all();
        foreach ($jobs as $job) {
            $job->created_date = Carbon::parse($job->created_date)->diffForHumans();
        }
        error_log("job search: " . $jobs);
        return view('livewire.jobs-component', ["query" => "", "freelancer" => $freelancer, "jobs" => $jobs, "proposal" => $proposals]);
    }

    public function formatRelativeTime($date)
    {
        return RelativeTimeFormatter::format($date);
    }

}
