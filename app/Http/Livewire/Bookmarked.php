<?php

namespace App\Http\Livewire;


use App\Models\FreelancerModel;
use App\Models\SavedJobs;
use Livewire\Component;

class Bookmarked extends Component
{
    public $freelancer;


    public function mount(){
        $this->freelancer = FreelancerModel::where("email", session()->get("email"))->get()->first();
    }

    public function removeSaved($project_id){
        SavedJobs::where("job_id", $project_id)->delete();
    }

    public function render()
    {
        $saved_by = $this->freelancer->freelancer_id;
        error_log($saved_by);
        $jobs = SavedJobs::where("freelancer_id", $saved_by)->get();
        error_log($this->freelancer . "freelancer");
        return view('livewire.bookmarked', ["saved_jobs" => $jobs, "freelancer" => $this->freelancer])->extends("freelancer-dashboard.dashboard", ["freelancer" => $this->freelancer]);
    }
}
