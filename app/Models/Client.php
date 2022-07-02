<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory, Notifiable;

    protected $table = "client";

    function jobs(){
        return $this->hasMany(JobModel::class, "job_id");
    }

    function hired(){
        return $this->hasMany(Hired::class);
    }
}
