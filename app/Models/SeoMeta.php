<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug',
        'page_name',
        'title',
        'description',
        'keywords',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'schema_extra',
    ];

    protected $casts = [
        'schema_extra' => 'array',
    ];

    public static function forPage(string $slug, array $fallback = []): ?self
    {
        $meta = static::where('page_slug', $slug)->first();
        if ($meta) {
            return $meta;
        }

        if (!empty($fallback)) {
            $newMeta = new static();
            $newMeta->page_slug = $slug;
            $newMeta->page_name = $fallback['page_name'] ?? ucfirst($slug);
            $newMeta->title = $fallback['title'] ?? 'DC Equipment - Construction Machinery & DCP Chemicals Jaipur';
            $newMeta->description = $fallback['description'] ?? 'Leading provider of construction equipment spares and DCP chemical solutions in Jaipur, Rajasthan.';
            $newMeta->keywords = $fallback['keywords'] ?? 'construction equipment jaipur, dcp chemicals rajasthan';
            return $newMeta;
        }

        return null;
    }
}
