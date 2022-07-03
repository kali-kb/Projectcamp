<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory, Notifiable;

    protected $table = "client";
    public $timestamps = false;

    function jobs(){
        return $this->hasMany(JobModel::class, "job_id");
    }

    function hired(){
        return $this->hasMany(Hired::class);
    }
    //total cost accessor
    protected function getTotalCostAttribute() {
        $cost = 0 ;
        $assigned_jobs = Hired::where("client_id", $this->id)->get();
        foreach($assigned_jobs as $assigned_job){
            $cost += $assigned_job->job->price;
        }
        return $cost;
    }

}
