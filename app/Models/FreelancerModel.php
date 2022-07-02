<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerModel extends Model
{
    use HasFactory;

    protected $table = "freelancer";

    public function proposals(){
        return $this->hasMany(Proposal::class);
    }
}
