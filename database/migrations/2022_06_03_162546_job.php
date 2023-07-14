<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


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
            $table->text("job_title");
            //nullable() -> optional on insert
            $table->text("job_description")->nullable();
            $table->unsignedBigInteger("id");
            $table->foreign("id")->references("id")->on("client")->cascadeOnDelete();
            $table->boolean("is_open")->default(true);
            $table->bigInteger("price")->default(10);
            $table->timestamp('created_date')->default(DB::raw('now()'));;
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
