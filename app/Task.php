<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task_code', 'title', 'type', 'priority', 'description', 'content', 'estimated_hours', 'created', 'assign', 'task_status'];
}
