<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\ArticleCategory;
use App\FaqCategory;
use App\LiveChat;
use App\Setting;
use App\Social;
use View;

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
        //
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();


        // Share view for Common Data
        $setting = Setting::where('status', '1')->first();
        $social = Social::where('status', '1')->first();
        $livechat = LiveChat::first();
        $article_submenus = ArticleCategory::where('status', '1')->get();
        $faq_submenus = FaqCategory::where('status', '1')->get();

        
        View::share(['setting' => $setting, 'social' => $social, 'livechat' => $livechat, 'article_submenus' => $article_submenus, 'faq_submenus' => $faq_submenus]);

    }
}
