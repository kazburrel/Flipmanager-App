<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, HasUuids, InteractsWithMedia;

    protected $fillable = [
        'name',
        'is_active',
        'created_by',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
