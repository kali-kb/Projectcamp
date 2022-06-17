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
        Schema::create("job", function(Blueprint $table){
            $table->id("job_id");
            $table->string("job_title", length:100);
            //nullable() -> optional on insert
            $table->string("job_description", length:500)->nullable();
            $table->unsignedBigInteger("id");
            $table->foreign("id")->references("id")->on("client")->cascadeOnDelete();
            $table->boolean("is_open")->default(true);
            $table->bigInteger("price")->default(10);
            $table->date("created_date")->default(date("Y-m-d H:i:s"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("job");
    }
};
