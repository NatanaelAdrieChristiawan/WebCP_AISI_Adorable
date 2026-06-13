<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Textarea::make('short_description')
                    ->columnSpanFull()
                    ->rows(3),
                RichEditor::make('description')
                    ->columnSpanFull(),
                TagsInput::make('features')
                    ->placeholder('Tambah keunggulan...')
                    ->columnSpanFull(),
                KeyValue::make('specifications')
                    ->keyLabel('Nama Spesifikasi')
                    ->valueLabel('Nilai/Detail')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory('products')
                    ->columnSpanFull(),
                FileUpload::make('gallery')
                    ->image()
                    ->multiple()
                    ->panelLayout('grid')
                    ->directory('products/gallery')
                    ->columnSpanFull(),
                TextInput::make('whatsapp_message')
                    ->columnSpanFull()
                    ->placeholder('Halo PT Aisi Aiken Indonesia, saya tertarik dengan produk...'),
                Toggle::make('is_featured')
                    ->required(),
                Toggle::make('is_active')
                    ->required()
                    ->default(true),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
