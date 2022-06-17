<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $table = "proposal";

    function job(){
        return $this->belongsTo(JobModel::class, "id");
    }

}