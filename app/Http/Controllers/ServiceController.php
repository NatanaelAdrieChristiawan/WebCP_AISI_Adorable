<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display the services page.
     */
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        // Separate services by category for easier rendering in view
        $preSales = $services->where('category', 'pre-sales');
        $afterSales = $services->where('category', 'after-sales');

        return view('pages.services', compact('preSales', 'afterSales', 'services'));
    }
}
