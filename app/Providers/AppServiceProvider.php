<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ContactCard;
use App\Models\SocialLink;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Make contact cards and social links available to all views
        View::composer('*', function ($view) {
            $view->with([
                'contactCards' => ContactCard::orderBy('order')->get(),
                'socialLinks' => SocialLink::orderBy('order')->get(),
            ]);
        });
    }
}
