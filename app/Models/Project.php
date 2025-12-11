<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = [
        'title',
        'description',
        'manager_id',
    ];
    public function manager()
    {
        return $this->belongsToMany(User::class, 'pivot_project')
            ->withPivot('role_in_project')
            ->withTimestamps()
            ->where('users.role', 'staff');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
