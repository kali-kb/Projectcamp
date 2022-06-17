<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proposal;
use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;

class JobModel extends Model
{
    use HasFactory, Searchable, Notifiable;

    public $timestamps = false;
    protected $table = "job";

    public function searchableAs(){
        return 'jobs_index';
    }

    public function proposals(){

        return $this->hasMany(Proposal::class, "job_id");
    
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