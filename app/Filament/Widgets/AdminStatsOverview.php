<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\Client;
use App\Models\BlogPost;
use Filament\Widgets\Widget;

class AdminStatsOverview extends Widget
{
    protected static ?int $sort = -40;

    protected string $view = 'filament.widgets.admin-stats-overview';

    protected int | string | array $columnSpan = 'full';

    protected function getViewData(): array
    {
        return [
            'productsCount' => Product::count(),
            'clientsCount' => Client::count(),
            'blogPostsCount' => BlogPost::count(),
        ];
    }
}
