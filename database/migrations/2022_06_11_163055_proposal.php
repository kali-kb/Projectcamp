<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("proposal", function(Blueprint $table){
            $table->id();
            //although a message should be send to the proposer when client removes a job
            //table should only reference an id not any other column
            $table->foreignId("job_id")->references("job_id")->on("job")->onDelete("cascade");
            $table->foreignId("freelancer_id")->references("freelancer_id")->on("freelancer")->onDelete("cascade");
            $table->timestamp("created_time");
            $table->string("proposal_text", 5000);
            $table->integer("bid");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("proposal");
    }
};
