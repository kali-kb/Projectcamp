<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proposal;
use App\Models\SavedJobs;
use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;

class JobModel extends Model
{
    use HasFactory, Searchable, Notifiable;

    public $timestamps = false;
    protected $table = "job";
    protected $primaryKey = 'job_id';

    public function searchableAs(){
        return 'jobs_index';
    }


    private function getCurrentlyLoggedinUser()
    {
        $currently_loggedin_user_email = session()->get("email");
        $currently_logged_in_user_id = FreelancerModel::where("email", $currently_loggedin_user_email)->get()->first()->freelancer_id;
        return $currently_logged_in_user_id;
    }

    public function hasFreelancerApplied()
    {
        // Check if the authenticated user has applied to this job
        $id = $this->getCurrentlyLoggedinUser();
        return $this->proposals()->where('freelancer_id', $id)->exists();
    }
    
    public function isBookmarkedJob()
    {
        $id = $this->getCurrentlyLoggedinUser();
        return $this->saved_job()->where("freelancer_id", $id)->exists();
    }


    public function proposals(){

        return $this->hasMany(Proposal::class, "job_id", "job_id");
    
    }

    public function hires(){
        return $this->hasOne(Hired::class, "id", "job_id");
    }

    public function saved_job(){
        return $this->hasOne(SavedJobs::class, "job_id", "job_id");
    }

    public function client(){
        return $this->belongsTo(Client::class, "id");
    }

    public function toSearchableArray(){
        $array = $this->toArray();
 
        // Customize the data array...
 
        return $array;
    }
}


//proposals created for one job with a job_id appearing for others too