<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use App\Services\ImageService;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('author', 'name')
                    ->required()
                    ->default(fn () => auth()->id())
                    ->label('Penulis'),
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                    ->label('Judul'),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Textarea::make('excerpt')
                    ->columnSpanFull()
                    ->rows(3)
                    ->label('Kutipan/Excerpt'),
                RichEditor::make('content')
                    ->columnSpanFull()
                    ->label('Konten Utama'),
                FileUpload::make('featured_image')
                    ->image()
                    ->directory('blog')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(10240)
                    ->saveUploadedFileUsing(fn ($file) => ImageService::optimizeAndStore($file, 'blog'))
                    ->columnSpanFull()
                    ->label('Gambar Utama'),
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ])
                    ->required()
                    ->default('draft'),
                DateTimePicker::make('published_at')
                    ->default(now())
                    ->label('Tanggal Publikasi'),
                TextInput::make('meta_title')
                    ->label('SEO Meta Title'),
                Textarea::make('meta_description')
                    ->columnSpanFull()
                    ->rows(2)
                    ->label('SEO Meta Description'),
                TextInput::make('view_count')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->disabled()
                    ->dehydrated()
                    ->label('Jumlah Pembaca'),
            ]);
    }
}

