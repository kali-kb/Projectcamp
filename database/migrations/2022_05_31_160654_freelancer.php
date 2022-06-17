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
        Schema::create("freelancer", function(Blueprint $table){
            $table->bigIncrements("freelancer_id")->unsigned();
            $table->string("email")->unique();
            $table->string("password");
            $table->string("profile_image_url");
            $table->string("name");
            $table->string("career");
            $table->string("location");
            $table->integer("rate");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("freelancer");
    }
};
