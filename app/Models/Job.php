<?php

namespace App\Models;

use App\Models\Access\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    public $fillable = [
        'title',
        'reward',
        'describe',
        'start_at',
        'max_hire',
        'location',
        'maintain',
        'work_hours_pre_day',
        'cover',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id');
    }

    public function employees()
    {
        return $this->hasManyThrough(User::class, Employee::class, 'job_id', 'id');
    }

    public function enrolls()
    {
        return $this->hasMany(Employee::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'job_tag_pivot');
    }
}
