<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hired extends Model
{
    use HasFactory;

    public $table = "hired";
    public $timestamps = false;

    
    public function job(){
        return $this->belongsTo(JobModel::class, "job_id", "job_id");
    }

    function hiree_client(){
        return $this->belongsTo(Client::class);
    }



    function hired_freelancer()
    {
        return $this->hasOne(FreelancerModel::class, 'freelancer_id', 'freelancer_id');
    }
}
