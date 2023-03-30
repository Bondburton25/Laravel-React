<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallationStep extends Model
{
    // use HasFactory;

    protected $fillable = [
        'name',
        'step',
        'description',
        'image',
        'coil'
    ];

    /**
     * Get all of the Inspections for the user.
     */
    public function inspections()
    {
        return $this->hasMany(InstallationStepInspection::class);
    }
}
