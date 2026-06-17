<?php

namespace App\Filament\Resources\Galleries\Schemas;

use App\Services\ImageService;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Nama Foto')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Upload Foto')
                    ->image()
                    ->required()
                    ->directory('galleries')
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(10240) // 10MB
                    ->saveUploadedFileUsing(fn ($file) => ImageService::optimizeAndStore($file, 'galleries', 800, 800))
                    ->helperText('Ukuran maksimal 10MB. Format: JPG, PNG, WebP. Gambar akan otomatis dioptimasi dan dikonversi ke WebP.')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('Tampilkan di Website')
                    ->default(true),
                TextInput::make('sort_order')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0)
                    ->helperText('Angka lebih kecil tampil lebih awal.'),
            ]);
    }
}

