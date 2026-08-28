<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

use App\Models\Newsbar;
use App\Models\SubscriptionPlan;
use App\Models\Testimonial;
use App\Models\BusinessSetting;
use App\Models\Career;

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
        Paginator::useBootstrapFive();

        View::composer('layouts.frontend.footer', function ($view) {
            $activeCareerCount = Career::query()
                ->where('visibility', true)
                ->where(function ($query) {
                    $query->whereNull('application_deadline')
                        ->orWhereDate('application_deadline', '>=', today());
                })
                ->count();

            $view->with('activeCareerCount', $activeCareerCount);
        });
    }
}
