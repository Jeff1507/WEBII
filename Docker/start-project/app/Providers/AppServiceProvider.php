<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Components\{textbox};

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void {
    }
    public function boot(): void {
        Blade::component('components.textbox', 'textbox');
    }
}
