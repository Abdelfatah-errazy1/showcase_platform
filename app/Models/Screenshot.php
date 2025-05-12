<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    use HasFactory;
    protected $fillable = ['caption', 'image_path', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
}
