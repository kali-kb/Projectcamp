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
        Schema::create('hired', function (Blueprint $table) {
            $table->id();
            $table->foreignId("freelancer_id")->references("freelancer_id")->on("freelancer")->onDelete("cascade");
            $table->foreignId("job_id")->references("job_id")->on("job")->onDelete("cascade");
            $table->boolean("finished")->default(false);
            $table->foreignId("client_id")->referenes("id")->on("client")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hired');
    }
};
