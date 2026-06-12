<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Milestone;

class CompanyController extends Controller
{
    public function index()
    {
        $milestones = Milestone::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $certifications = Certification::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('pages.company', compact('milestones', 'certifications'));
    }
}
