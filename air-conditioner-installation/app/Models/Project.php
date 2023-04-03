<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
//    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'number',
        'details',
        'image',
        'customer',
        'address',
        'latitude',
        'longitude'
    ];

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model) {
            $model->number = sprintf('%03d', Project::count()+1);
        });
    }

    public function installations()
    {
        return $this->hasMany(Installation::class);
    }
}
