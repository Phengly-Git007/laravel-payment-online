<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $settings = Setting::all('key','value')
            ->keyBy('key')
            ->transform(function($setting){
                return $setting->value;
            })
            ->toArray();
        config([
            'settings' => $settings,
        ]);
        config(['app.name'=>config('settings.app_name')]);
        config(['app.phone'=>config('settings.phone')]);
        config(['app.email'=>config('settings.email')]);
        config(['app.currency_symbol'=>config('settings.currency_symbol')]);
        config(['app.location'=>config('settings.location')]);
        config(['app.map_link'=>config('settings.map_link')]);
        config(['app.social_media'=>config('settings.social_media')]);
    }
}
