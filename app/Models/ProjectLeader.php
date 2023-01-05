<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLeader extends Model
{
    use HasFactory;
    protected $table = 'project_leader';
    protected $fillable = [
        'name',
        'email',
        'photo'
    ];

    public function projects()
    {
        return $this->hasMany(ProjectMonitoring::class, 'leader_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($leader) { // before delete() method call this
             $leader->projects()->delete();
             // do the rest of the cleanup...
        });
    }
}
