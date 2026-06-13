<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CompanySetting extends Model
{
    protected $fillable = ['key', 'value', 'type', 'label', 'group', 'sort_order'];

    public static function get(string $key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Get the public URL for a file-type setting.
     * Returns null if the setting is empty or file doesn't exist.
     */
    public static function getFileUrl(string $key): ?string
    {
        $path = static::get($key);
        if (!$path) {
            return null;
        }
        return Storage::disk('public')->url($path);
    }

    public static function set(string $key, $value)
    {
        return static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
