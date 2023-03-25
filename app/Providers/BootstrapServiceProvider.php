<?php

namespace Zevitagem\LaravelToolkitApresentation\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Zevitagem\LaravelSaasTemplateCore\View\Components\DynamicEntityComponent;

class BootstrapServiceProvider extends ServiceProvider
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
        $src = __DIR__ . '/../..';
        
        $this->publishes([
            $src.'/resources/css' => resource_path('template/css'),
        ], 'template_core:resources');
        
        $this->publishes([
            $src.'/resources/js' => resource_path('template/js'),
        ], 'template_core:resources');
        
        $this->publishes([
            $src.'/resources/sass' => resource_path('template/sass'),
        ], 'template_core:resources');
        
        $this->publishes([
            $src.'/resources/views' => resource_path('views/vendor/toolkit_apresentation'),
        ], 'toolkit_apresentation:views');
        
        $this->publishes([
            $src . '/public' => public_path('toolkit_apresentation')
        ], 'toolkit_apresentation:public');
        
        $this->loadViewsFrom(resource_path('views/vendor/toolkit_apresentation'), 'toolkit_apresentation');
    }
}
