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
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->string('milestone_name');
            $table->string('milestone_description')->nullable();
            $table->string('milestone_start_date')->nullable();
            $table->string('milestone_end_date')->nullable();
            $table->string('milestone_budget')->nullable();
            $table->string('milestone_percentage')->nullable();
            $table->string('milestone_priority')->nullable();
            $table->string('milestone_status')->nullable();

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestones');
    }
};
