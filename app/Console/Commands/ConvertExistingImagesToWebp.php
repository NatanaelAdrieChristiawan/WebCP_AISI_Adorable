<?php

namespace App\Console\Commands;

use App\Models\BlogPost;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\Product;
use App\Services\ImageService;
use Illuminate\Console\Command;

class ConvertExistingImagesToWebp extends Command
{
    protected $signature = 'images:convert-webp
                            {--dry-run : Show what would be converted without actually converting}';

    protected $description = 'Convert all existing uploaded images to optimized WebP format';

    private int $converted = 0;
    private int $skipped = 0;
    private int $failed = 0;

    public function handle(): int
    {
        $dryRun = $this->option('dry-run');

        if ($dryRun) {
            $this->info('🔍 DRY RUN — no files will be modified.');
        } else {
            $this->warn('⚠️  This will convert all existing images to WebP and delete originals.');
            if (! $this->confirm('Make sure you have a backup. Continue?')) {
                return self::SUCCESS;
            }
        }

        $this->newLine();

        $this->convertProducts($dryRun);
        $this->convertGalleries($dryRun);
        $this->convertBlogPosts($dryRun);
        $this->convertClients($dryRun);

        $this->newLine();
        $this->info("✅ Done! Converted: {$this->converted} | Skipped: {$this->skipped} | Failed: {$this->failed}");

        return self::SUCCESS;
    }

    private function convertProducts(bool $dryRun): void
    {
        $this->info('📦 Converting Products...');
        $products = Product::whereNotNull('image')->orWhereNotNull('gallery')->get();

        $bar = $this->output->createProgressBar($products->count());
        $bar->start();

        foreach ($products as $product) {
            // Main image
            if ($product->image) {
                $this->convertField($product, 'image', 'products', $dryRun);
            }

            // Gallery (JSON array)
            if ($product->gallery && is_array($product->gallery)) {
                $updated = false;
                $galleryPaths = $product->gallery;

                foreach ($galleryPaths as $index => $path) {
                    if (str_ends_with(strtolower($path), '.webp')) {
                        $this->skipped++;
                        continue;
                    }

                    if ($dryRun) {
                        $this->converted++;
                        continue;
                    }

                    $newPath = ImageService::convertExisting($path, 'products/gallery');
                    if ($newPath) {
                        $galleryPaths[$index] = $newPath;
                        $updated = true;
                        $this->converted++;
                    } else {
                        $this->failed++;
                    }
                }

                if ($updated) {
                    $product->update(['gallery' => array_values($galleryPaths)]);
                }
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
    }

    private function convertGalleries(bool $dryRun): void
    {
        $this->info('🖼️  Converting Galleries...');
        $galleries = Gallery::whereNotNull('image')->get();

        $bar = $this->output->createProgressBar($galleries->count());
        $bar->start();

        foreach ($galleries as $gallery) {
            $this->convertField($gallery, 'image', 'galleries', $dryRun, 1920, 1080, 85);
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
    }

    private function convertBlogPosts(bool $dryRun): void
    {
        $this->info('📝 Converting Blog Posts...');
        $posts = BlogPost::whereNotNull('featured_image')->get();

        $bar = $this->output->createProgressBar($posts->count());
        $bar->start();

        foreach ($posts as $post) {
            $this->convertField($post, 'featured_image', 'blog', $dryRun);
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
    }

    private function convertClients(bool $dryRun): void
    {
        $this->info('🏢 Converting Client Logos...');
        $clients = Client::whereNotNull('logo')->get();

        $bar = $this->output->createProgressBar($clients->count());
        $bar->start();

        foreach ($clients as $client) {
            $this->convertField($client, 'logo', 'clients', $dryRun, 400, 400, 85);
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
    }

    private function convertField(
        $model,
        string $field,
        string $directory,
        bool $dryRun,
        int $maxWidth = 1920,
        int $maxHeight = 1080,
        int $quality = 85,
    ): void {
        $currentPath = $model->{$field};

        if (! $currentPath || str_ends_with(strtolower($currentPath), '.webp')) {
            $this->skipped++;
            return;
        }

        if ($dryRun) {
            $this->converted++;
            return;
        }

        $newPath = ImageService::convertExisting($currentPath, $directory, $maxWidth, $maxHeight, $quality);

        if ($newPath) {
            $model->update([$field => $newPath]);
            $this->converted++;
        } else {
            $this->failed++;
        }
    }
}
