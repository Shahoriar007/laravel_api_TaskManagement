<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    use HasFactory;

    protected $fillable = [
        'milestone_name',
        'milestone_description',
        'milestone_start_date',
        'milestone_end_date',
        'milestone_budget',
        'milestone_percentage',
        'milestone_priority',
        'milestone_status',
        'project_id',
    ];
}
