<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    public $fillable = [
        'user_id',
        'job_id',
        'publisher',
        'status',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
