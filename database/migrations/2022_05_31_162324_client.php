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
        Schema::create("client", function(Blueprint $table){
            $table->id();
            $table->string("email")->unique();
            $table->string("password");
            $table->string("name", length:50);
            $table->string("location");
            $table->integer("total_spent")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("client");
    }
};
