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
            $src.'/resources/css' => resource_path('apresentation_template/css'),
        ], 'apresentation_template:resources');
        
        $this->publishes([
            $src.'/resources/js' => resource_path('apresentation_template/js'),
        ], 'apresentation_template:resources');
        
        $this->publishes([
            $src.'/resources/sass' => resource_path('apresentation_template/sass'),
        ], 'apresentation_template:resources');
        
        $this->publishes([
            $src.'/resources/views' => resource_path('views/vendor/apresentation_template'),
        ], 'apresentation_template:views');
        
        $this->publishes([
            $src . '/public' => public_path('apresentation_template')
        ], 'apresentation_template:public');
        
        $this->loadViewsFrom(resource_path('views/vendor/apresentation_template'), 'apresentation_template');
    }
}
