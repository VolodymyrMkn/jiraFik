<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Projects extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'title', 'description', 'users_id', 'image'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function tasks()
    {
        return $this->hasMany(Tasks::class, 'projects_id');
    }

}
