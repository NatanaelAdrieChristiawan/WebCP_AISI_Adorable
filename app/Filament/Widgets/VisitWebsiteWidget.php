<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class VisitWebsiteWidget extends Widget
{
    protected static ?int $sort = -50;

    protected string $view = 'filament.widgets.visit-website-widget';

    protected int | string | array $columnSpan = 'full';
}
