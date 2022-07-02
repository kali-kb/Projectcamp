<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobModel;


class SavedJobs extends Model
{
    use HasFactory;

    protected $table = "saved_jobs";

    public function jobs(){
        return $this->belongsTo(JobModel::class, "job_id", "job_id");
    }
}
