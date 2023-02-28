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
        Schema::create('project_teams', function (Blueprint $table) {
            $table->id('project_team_id');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('project_teams', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('project_teams');
    }
};
