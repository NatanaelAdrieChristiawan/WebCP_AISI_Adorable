<?php

namespace App\Filament\Resources\CompanySettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CompanySettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('label')
                    ->label('Label (nama tampilan)')
                    ->columnSpanFull(),

                Select::make('type')
                    ->required()
                    ->default('text')
                    ->options([
                        'text'     => 'Text',
                        'textarea' => 'Textarea',
                        'file'     => 'File Upload',
                        'boolean'  => 'Boolean',
                    ])
                    ->live()
                    ->columnSpanFull(),

                // --- Text type ---
                TextInput::make('value')
                    ->label('Nilai (Value)')
                    ->columnSpanFull()
                    ->visible(fn ($get) => in_array($get('type'), ['text', 'boolean', null, ''])),

                // --- Textarea type ---
                Textarea::make('value')
                    ->label('Nilai (Value)')
                    ->rows(4)
                    ->columnSpanFull()
                    ->visible(fn ($get) => $get('type') === 'textarea'),

                // --- File type ---
                FileUpload::make('value')
                    ->label('Upload File')
                    ->disk('public')
                    ->directory('company-files')
                    ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png', 'image/svg+xml'])
                    ->maxSize(20480) // 20 MB
                    ->downloadable()
                    ->previewable(false)
                    ->helperText('Upload file PDF atau gambar. Maks 20 MB.')
                    ->columnSpanFull()
                    ->visible(fn ($get) => $get('type') === 'file'),

                Select::make('group')
                    ->required()
                    ->default('general')
                    ->options([
                        'general'  => 'General',
                        'about'    => 'About',
                        'contact'  => 'Contact',
                        'social'   => 'Social Media',
                        'homepage' => 'Homepage',
                        'seo'      => 'SEO',
                    ]),

                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
