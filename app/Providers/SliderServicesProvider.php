<?php

namespace App\Providers;

use App\Models\Slider;
use Illuminate\Support\ServiceProvider;

class SliderServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer('frontend.slider', function($view){
           $view->with('sliderShowMobile', Slider::where('status', 1)->where('device', 'mobile')->get());
           $view->with('sliderShowDesktop', Slider::where('status', 1)->where('device', 'desktop')->get());
          
       });
    }
}
