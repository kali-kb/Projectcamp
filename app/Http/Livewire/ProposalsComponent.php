<?php

namespace App\Http\Livewire;

use App\Models\Proposal;
use Livewire\Component;
use App\Models\JobModel;
use App\Models\Client;
use App\Models\Hired;

class ProposalsComponent extends Component
{

    public $job;


    public function mount($id){
        $this->job = JobModel::where("job_id", $id)->get()->first();
    }


    public function removeProposal($proposal_id){
        Proposal::find($proposal_id)->delete();
    }

    public function acceptProposal($proposal_id){
        $this->job->is_open = false;
        $this->job->save();
        $hired = new Hired();
        $hired->freelancer_id = Proposal::find($proposal_id)->freelancer->freelancer_id;
        $hired->job_id = $this->job->job_id;
        $hired->save();
    }

    public function render()
    {
        error_log($this->job);
         $client = Client::where("email", session()->get("email"))->get()->first();
        return view('livewire.proposals-component', ["job" => $this->job, "proposals" => $this->job->proposals])
        ->extends("client-dashboard.client-main", ["client" => $client]);
    }
}
