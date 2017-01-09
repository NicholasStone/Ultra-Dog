<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    public $fillable = [
        'name',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function belongsToMany($related, $table = null, $foreignKey = null, $otherKey = null, $relation = null)
    {
        return $this->belongsToMany(Job::class, 'job_tag_pivot');
    }
}
