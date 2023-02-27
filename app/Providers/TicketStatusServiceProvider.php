<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\TicketStatus;

class TicketStatusServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //Dedicated view composer for the ticket status values
        //The data should be available across all views that use the layouts
        View::composer('*', function ($view) {
            $view->with('statuses', TicketStatus::all());
        });
    }
}
