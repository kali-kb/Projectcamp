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
    public $job_id;

    public function mount($id){
        error_log("the id: " . $id);
        $this->job = JobModel::where("job_id", $id)->get()->first();
        $this->job_id = $id;
    }


    public function removeProposal($proposal_id){
        Proposal::find($proposal_id)->delete();
    }

    public function acceptProposal($proposal_id){
        $this->job->is_open = false;
        $this->job->price =  Proposal::find($proposal_id)->bid;
        $this->job->save();
        $hired = new Hired();
        $hired->freelancer_id = Proposal::find($proposal_id)->freelancer->freelancer_id;
        $hired->job_id = $this->job->job_id;
        $hired->client_id = $this->job->id;
        $hired->save();
        $proposals = Proposal::where("job_id", $hired->job_id)->get();
        //whenever one proposal is accepted all proposals are going to cleared and job post closes
        foreach($proposals as $proposal){
            $proposal->delete();
        }
        $this->render();
    }

    public function render()
    {
        error_log("the job:" . $this->job);
        $client = Client::where("email", session()->get("email"))->get()->first();
        $proposals = Proposal::where("job_id", $this->job_id)->get();
        return view('livewire.proposals-component', ["job" => $this->job, "proposals" => $proposals])
        ->extends("client-dashboard.client-main", ["client" => $client]);
    }
}
