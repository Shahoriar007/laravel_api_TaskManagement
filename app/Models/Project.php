<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'project_description',
        'project_start_date',
        'project_end_date',
        'project_budget',
        'project_priority',
        'project_manager',
    ];
}
