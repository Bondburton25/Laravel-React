<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthProvider extends Model
{
    protected $table = 'auth_providers';

    protected $fillable = ['provider', 'provider_id', 'user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
