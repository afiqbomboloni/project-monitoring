<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMonitoring extends Model
{
    use HasFactory;
    protected $table = 'project_monitoring';
    protected $dates = ['start_date', 'end_date'];
    protected $fillable = [
        'project_name',
        'client',
        'leader_id',
        'start_date',
        'end_date',
        'progress'
    ];

    public function leader()
    {
        return $this->belongsTo(ProjectLeader::class, 'leader_id', 'id');
    }
}
