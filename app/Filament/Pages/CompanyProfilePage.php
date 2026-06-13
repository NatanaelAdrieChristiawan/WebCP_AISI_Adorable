<?php

namespace App\Filament\Pages;

use App\Models\CompanySetting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Illuminate\Support\Facades\Storage;
use UnitEnum;

class CompanyProfilePage extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'filament.pages.company-profile';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-arrow-down';

    protected static string|UnitEnum|null $navigationGroup = 'Company Info';

    protected static ?string $navigationLabel = 'Company Profile';

    protected static ?string $title = 'Company Profile';

    protected static ?int $navigationSort = 10;

    public ?array $data = [];

    public function mount(): void
    {
        $currentFile = CompanySetting::get('company_profile_file');
        $this->form->fill([
            'company_profile_file' => $currentFile,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                FileUpload::make('company_profile_file')
                    ->label('File Company Profile')
                    ->disk('public')
                    ->directory('company-files')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(20480)
                    ->downloadable()
                    ->previewable(false)
                    ->helperText('Upload file PDF Company Profile. Maks 20 MB. File ini akan muncul sebagai tombol "Unduh Company Profile" di halaman utama website.')
                    ->columnSpanFull(),
            ]);
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([EmbeddedSchema::make('form')])
                    ->id('company-profile-form')
                    ->livewireSubmitHandler('save')
                    ->footer([
                        Actions::make($this->getFormActions())
                            ->key('form-actions'),
                    ]),
            ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Company Profile')
                ->submit('save')
                ->color('primary'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $filePath = $data['company_profile_file'] ?? null;

        CompanySetting::updateOrCreate(
            ['key' => 'company_profile_file'],
            [
                'value'      => $filePath,
                'type'       => 'file',
                'label'      => 'File Company Profile (PDF)',
                'group'      => 'general',
                'sort_order' => 6,
            ]
        );

        Notification::make()
            ->title('Berhasil disimpan')
            ->body($filePath
                ? 'File Company Profile berhasil diupload. Tombol unduh di halaman utama sudah aktif.'
                : 'File Company Profile dihapus. Tombol unduh di halaman utama tidak aktif.'
            )
            ->success()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        $currentFile = CompanySetting::get('company_profile_file');

        if ($currentFile) {
            return [
                Action::make('preview')
                    ->label('Lihat File Saat Ini')
                    ->icon('heroicon-o-eye')
                    ->url(Storage::disk('public')->url($currentFile))
                    ->openUrlInNewTab()
                    ->color('gray'),
            ];
        }

        return [];
    }
}
