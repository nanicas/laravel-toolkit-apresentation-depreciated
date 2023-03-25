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
            $src.'/resources/css' => resource_path('presentation_template/css'),
        ], 'presentation_template:resources');
        
        $this->publishes([
            $src.'/resources/js' => resource_path('presentation_template/js'),
        ], 'presentation_template:resources');
        
        $this->publishes([
            $src.'/resources/sass' => resource_path('presentation_template/sass'),
        ], 'presentation_template:resources');
        
        $this->publishes([
            $src.'/resources/views' => resource_path('views/vendor/presentation_template'),
        ], 'presentation_template:views');
        
        $this->publishes([
            $src . '/public' => public_path('presentation_template')
        ], 'presentation_template:public');
        
        $this->loadViewsFrom(resource_path('views/vendor/presentation_template'), 'presentation_template');
    }
}
