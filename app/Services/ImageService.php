<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Interfaces\ImageInterface;

class ImageService
{
    /**
     * Process an uploaded image: resize, compress, and convert to WebP.
     *
     * @param  UploadedFile  $file       The uploaded file from Filament
     * @param  string        $directory  Subdirectory in public disk (e.g. 'products', 'galleries')
     * @param  int           $maxWidth   Maximum width in pixels
     * @param  int           $maxHeight  Maximum height in pixels
     * @param  int           $quality    WebP encoding quality (1-100)
     * @return string                    Relative path stored in public disk
     */
    public static function optimizeAndStore(
        UploadedFile $file,
        string $directory,
        int $maxWidth = 1920,
        int $maxHeight = 1080,
        int $quality = 80,
    ): string {
        $image = Image::decode($file->getRealPath());

        // Scale down if exceeds max dimensions, maintaining aspect ratio
        $image = static::scaleDown($image, $maxWidth, $maxHeight);

        // Encode to WebP
        $encoded = $image->encode(new \Intervention\Image\Encoders\WebpEncoder($quality));

        // Generate unique filename
        $filename = $directory . '/' . Str::ulid() . '.webp';

        // Store to public disk
        Storage::disk('public')->put($filename, (string) $encoded);

        return $filename;
    }

    /**
     * Process an existing file from storage: read, resize, compress, convert to WebP.
     * Used by the migration command for existing images.
     *
     * @param  string  $currentPath  Current relative path in public disk
     * @param  string  $directory    Target subdirectory
     * @param  int     $maxWidth     Maximum width
     * @param  int     $maxHeight    Maximum height
     * @param  int     $quality      WebP quality
     * @return string|null           New relative path, or null on failure
     */
    public static function convertExisting(
        string $currentPath,
        string $directory,
        int $maxWidth = 1920,
        int $maxHeight = 1080,
        int $quality = 80,
    ): ?string {
        // Skip if already webp
        if (str_ends_with(strtolower($currentPath), '.webp')) {
            return null;
        }

        $disk = Storage::disk('public');

        if (! $disk->exists($currentPath)) {
            return null;
        }

        try {
            $image = Image::decode($disk->get($currentPath));
            $image = static::scaleDown($image, $maxWidth, $maxHeight);
            $encoded = $image->encode(new \Intervention\Image\Encoders\WebpEncoder($quality));

            $filename = $directory . '/' . Str::ulid() . '.webp';
            $disk->put($filename, (string) $encoded);

            // Delete original file
            $disk->delete($currentPath);

            return $filename;
        } catch (\Throwable $e) {
            report($e);
            return null;
        }
    }

    /**
     * Scale an image down if it exceeds max dimensions.
     * Does nothing if the image is already within bounds.
     */
    protected static function scaleDown(ImageInterface $image, int $maxWidth, int $maxHeight): ImageInterface
    {
        $width = $image->width();
        $height = $image->height();

        if ($width > $maxWidth || $height > $maxHeight) {
            $image = $image->scaleDown($maxWidth, $maxHeight);
        }

        return $image;
    }
}
