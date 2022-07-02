<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hired extends Model
{
    use HasFactory;

    public $table = "hired";

    public function job(){
        return $this->belongsTo(JobModel::class, "job_id", "id");
    }

    function hiree_client(){
        return $this->belongsTo(Client::class);
    }
}
