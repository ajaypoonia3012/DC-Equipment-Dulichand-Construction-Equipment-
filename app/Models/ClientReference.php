<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientReference extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'client_name',
        'sector',
        'location',
        'scope_supplied',
        'testimonial',
        'testimonial_author',
        'logo',
        'image',
        'project_image',
        'gallery',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->orderBy('sort_order', 'asc');
    }
}
