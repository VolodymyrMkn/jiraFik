<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'projects_id', 'status_id'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function projects()
    {
        return $this->belongsTo(Projects::class);
    }

    public static function tasks($request, $project)
    {
        if ($input = $request->text_input) {
            foreach ($input as $element) {
                foreach ($element as $id => $key) {
                    Tasks::create([
                        'title' => $key,
                        'status_id' => 1,
                        'projects_id' => $project->id
                    ]);
                }
            }
        }
    }
}
