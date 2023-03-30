<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallationStepInspection extends Model
{
    // use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'installation_step_id'
    ];

    /**
     * Get the installation step that owns the Installation Step Inspection.
     */
    public function installation_step(): BelongsTo
    {
        return $this->belongsTo(InstallationStep::class);
    }
}
