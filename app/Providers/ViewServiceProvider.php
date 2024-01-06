<?php

namespace App\Providers;

use App\View\Composers\CartComposer;
use App\View\Composers\OrderComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        View::composer('*', CartComposer::class);
        View::composer('layouts.dashboard-sidebar', OrderComposer::class);
    }
}
