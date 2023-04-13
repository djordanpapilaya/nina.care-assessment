<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * 		'uuid',
    'facet_slug',
    'type',
    'created_at',
    'updated_at',
    'deleted_at',
     */
    public function up(): void
    {
        Schema::create('facet_group', function (Blueprint $table) {
            $table->id('uuid');
            $table->string('facet_slug');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facet_group');
    }
};
