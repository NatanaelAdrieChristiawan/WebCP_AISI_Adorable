<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Services\ImageService;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Nama Layanan')
                    ->required()
                    ->maxLength(255),
                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'pre-sales' => 'Pre-Sales',
                        'after-sales' => 'After-Sales',
                    ])
                    ->required(),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('icon')
                    ->label('Icon (Optional)')
                    ->helperText('Nama icon Heroicon (misalnya: key, shield-check, wrench, user-group, dll.)')
                    ->maxLength(255),
                FileUpload::make('image')
                    ->label('Foto Kegiatan (Optional)')
                    ->image()
                    ->directory('services')
                    ->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(10240) // 10MB
                    ->saveUploadedFileUsing(fn ($file) => ImageService::optimizeAndStore($file, 'services', 1200, 800))
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
