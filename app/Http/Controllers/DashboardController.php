<?php

namespace App\Http\Controllers;

use App\Models\UiBlock;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('dashboard', [
            'uiBlocks' => UiBlock::where('is_active', true)
                ->orderBy('order')
                ->get()
        ]);
    }
}
