<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasUuids;

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
