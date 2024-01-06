<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardLayout extends Component
{
    public function __construct(public string|null $pageTitle = null)
    {
        //
    }

    public function render(): View
    {
        return view('layouts.dashboard');
    }
}
