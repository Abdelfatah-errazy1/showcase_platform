<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Technology extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($technology) {
            if (empty($technology->slug)) {
                $technology->slug = Str::slug($technology->name);
            }
        });
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
