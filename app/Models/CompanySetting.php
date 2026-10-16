<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class CompanySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'group',
        'label',
        'value',
        'type',
    ];

    public static function get(string $key, $default = null)
    {
        return Cache::rememberForever("setting_{$key}", function () use ($key, $default) {
            $setting = static::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    public static function set(string $key, $value, $group = 'general', $label = null, $type = 'text')
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'group' => $group,
                'label' => $label ?? ucwords(str_replace('_', ' ', $key)),
                'value' => $value,
                'type' => $type,
            ]
        );

        Cache::forget("setting_{$key}");

        return $setting;
    }

    public static function getAllGrouped(): array
    {
        return static::all()->groupBy('group')->toArray();
    }
}
