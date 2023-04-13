<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * 'uuid',
    'group_id',
    'created_at',
    'updated_at',
    'deleted_at',
     */
    public function up(): void
    {
        Schema::create('facet', function (Blueprint $table) {
            $table->id('uuid');
	        $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('uuid')->on('facet_group');
            $table->string('facet_slug');
            $table->string('value');
            $table->timestamps();

            //$table->foreign('shop_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facet');
    }
};
