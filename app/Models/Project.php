<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
      protected $fillable = [
        'title',
        'slug',
        'description',
        'demo_url',
        'download_url',
        'documentation',
        'image_path',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public function files()
    {
        return $this->hasMany(ProjectFile::class);
    }

    public function screenshots()
    {
        return $this->hasMany(Screenshot::class);
    }

    public function documentationPages()
    {
        return $this->hasMany(DocumentationPage::class);
    }
}
