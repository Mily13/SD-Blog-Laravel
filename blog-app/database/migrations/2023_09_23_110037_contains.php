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
        Schema::create('contains', function (Blueprint $table) {
            $table->unsignedBigInteger('p_id');
            $table->unsignedBigInteger('t_id');
            $table->primary(['p_id', 't_id']);
            $table->foreign('p_id')->references('p_id')->on('posts')->onDelete('cascade');
            $table->foreign('t_id')->references('t_id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contains');
    }
};
