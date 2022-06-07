<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        // システム管理者のみ許可
        gate::define('admin-onry',function($user){
            return($user->role == 1);
        });
        // 店舗代表者以上に許可
        gate::define('owner-higher',function($user){
            return($user->role > 0 && $user->role <= 5);
        });
        // 一般ユーザー以上に許可
        gate::define('user-higher',function($user){
            return($user->role > 0 && $user->role <= 10);
        });
    }
}
