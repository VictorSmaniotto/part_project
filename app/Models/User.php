<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use App\Helpers\AvatarUrl;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_photo_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo_path
            ? asset('storage/' . $this->profile_photo_path)
            : AvatarUrl::generate($this->email);
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'professor_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_users');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // public function likes()
    // {
    //     return $this->hasMany(Like::class);
    // }

    public function likedProjects()
{
    return $this->belongsToMany(Project::class, 'likes');
}

    public function shares()
    {
        return $this->hasMany(Share::class);
    }

    public function setRoleAttribute(UserRole $role)
    {
        $this->attributes['role'] = $role->value;
    }

    public function getRoleAttribute($value): UserRole
    {
        return UserRole::from($value);
    }
}
