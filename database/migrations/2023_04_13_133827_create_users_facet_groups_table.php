<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_facet_groups', function (Blueprint $table) {
            $table->id('uuid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('facet_group_id');
	        $table->foreign('user_id')->references('id')->on('users');
	        $table->foreign('facet_group_id')->references('uuid')->on('facet_group');
	        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_facet_groups');
    }
};
