<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'course_id',
        'professor_id',
        'project_type',
        'rating',
    ];

    public function team()
    {
        // return $this->hasOne(Team::class);
        return $this->belongsTo(Team::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, TeamUser::class, 'team_id', 'id', 'team_id', 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function professor()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function shares()
    {
        return $this->hasMany(Share::class);
    }
}
