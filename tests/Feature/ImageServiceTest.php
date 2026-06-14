<?php

namespace Tests\Feature;

use App\Services\ImageService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImageServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Fake public filesystem
        Storage::fake('public');
    }

    public function test_it_can_optimize_and_store_uploaded_images_as_webp(): void
    {
        // 1. Create a large fake image (e.g., 2500x2000 pixels)
        $fakeImage = UploadedFile::fake()->image('test-product.jpg', 2500, 2000);

        // 2. Run through ImageService
        $storedPath = ImageService::optimizeAndStore(
            $fakeImage,
            'products',
            1920,
            1080,
            80
        );

        // 3. Assertions
        $this->assertNotNull($storedPath);
        $this->assertTrue(str_ends_with($storedPath, '.webp'));
        $this->assertTrue(str_starts_with($storedPath, 'products/'));

        // Assert file exists on fake storage
        Storage::disk('public')->assertExists($storedPath);

        // Assert that the image properties are correct (e.g. dimensions are scaled down)
        $diskPath = Storage::disk('public')->path($storedPath);
        $size = getimagesize($diskPath);

        $this->assertEquals('image/webp', $size['mime']);
        $this->assertLessThanOrEqual(1920, $size[0]);
        $this->assertLessThanOrEqual(1080, $size[1]);
    }

    public function test_it_does_not_scale_up_small_images(): void
    {
        $fakeImage = UploadedFile::fake()->image('small.png', 200, 150);

        $storedPath = ImageService::optimizeAndStore(
            $fakeImage,
            'clients',
            400,
            400,
            85
        );

        Storage::disk('public')->assertExists($storedPath);

        $diskPath = Storage::disk('public')->path($storedPath);
        $size = getimagesize($diskPath);

        $this->assertEquals('image/webp', $size['mime']);
        // Dimensions should remain 200x150, not scaled up to 400x400
        $this->assertEquals(200, $size[0]);
        $this->assertEquals(150, $size[1]);
    }

    public function test_it_can_convert_existing_images_to_webp(): void
    {
        $disk = Storage::disk('public');

        // Place a raw JPG in storage
        $originalFilename = 'products/old-image.jpg';
        $fakeImage = UploadedFile::fake()->image('old-image.jpg', 1200, 800);
        $disk->put($originalFilename, $fakeImage->getContent());

        $disk->assertExists($originalFilename);

        // Run conversion
        $newPath = ImageService::convertExisting(
            $originalFilename,
            'products',
            1000,
            1000,
            80
        );

        // Assertions
        $this->assertNotNull($newPath);
        $this->assertTrue(str_ends_with($newPath, '.webp'));
        
        // Original should be deleted
        $disk->assertMissing($originalFilename);
        
        // New webp should exist
        $disk->assertExists($newPath);

        $diskPath = $disk->path($newPath);
        $size = getimagesize($diskPath);
        $this->assertEquals('image/webp', $size['mime']);
        $this->assertLessThanOrEqual(1000, $size[0]);
        $this->assertLessThanOrEqual(1000, $size[1]);
    }
}
