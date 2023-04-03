<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installation extends Model
{
    protected $fillable = [
        'serial_number',
        'technician',
        'project_id',
        'building',
        'image',
        'floor',
        'room',
        'type'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
