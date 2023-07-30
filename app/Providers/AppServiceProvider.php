<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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
    view()->composer('*', function ($view) {

      if (Auth::check()) {
        $notifications = auth()->user()->notifications->take(5);
        $view->with('notifications', $notifications);
      }
    });
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    //
  }
}
