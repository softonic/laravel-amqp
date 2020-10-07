<?php

namespace Softonic\Amqp;

use Softonic\Amqp\Consumer;
use Softonic\Amqp\Publisher;
use Illuminate\Support\ServiceProvider;

class AmqpServiceProvider extends ServiceProvider
{
    
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('Amqp', 'Softonic\Amqp\Amqp');
        if (!class_exists('Amqp')) {
            class_alias('Softonic\Amqp\Facades\Amqp', 'Amqp');
        }

        $this->publishes([
            __DIR__.'/../config/amqp.php' => config_path('amqp.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Softonic\Amqp\Publisher', function ($app) {
            return new Publisher(config());
        });
        $this->app->singleton('Softonic\Amqp\Consumer', function ($app) {
            return new Consumer(config());
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Amqp', 'Softonic\Amqp\Publisher', 'Softonic\Amqp\Consumer'];
    }
}
