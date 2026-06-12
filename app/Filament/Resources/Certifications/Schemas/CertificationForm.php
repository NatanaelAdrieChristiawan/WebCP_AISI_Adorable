<?php

namespace App\Filament\Resources\Certifications\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CertificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('certificate_name')
                    ->required(),
                TextInput::make('issuing_body')
                    ->required(),
                TextInput::make('certificate_number'),
                DatePicker::make('valid_from'),
                DatePicker::make('valid_until'),
                FileUpload::make('certificate_file')
                    ->directory('certifications'),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
