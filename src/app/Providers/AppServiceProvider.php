<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//URLクラスを読み込み
use Illuminate\Support\Facades\URL;

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
     * 開発環境の時のURLがhttp、本番環境の時のURLがhttpsへ
     *
     * @return void
     */
    public function boot()
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
