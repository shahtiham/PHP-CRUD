<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// This is the model to handle different query operations on the task table in the database.
class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name'
    ];
}
