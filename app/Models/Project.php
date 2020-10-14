<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /*
     * Basic Eloquent Relationships
     * https://laracasts.com/series/laravel-6-from-scratch/episodes/29?autoplay=true
     * */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
