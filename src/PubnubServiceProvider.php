<?php namespace Cwt137\PubnubDriver;

use Illuminate\Support\ServiceProvider;
use Pubnub\Pubnub;
use Cwt137\PubnubDriver\PubnubBroadcaster;

class PubnubServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app('Illuminate\Broadcasting\BroadcastManager')->extend(
            'pubnub',
            function ($app) {
                $config = $this->app['config']["broadcasting.connections.pubnub"];

                return new PubnubBroadcaster(
                    new Pubnub($config['publish_key'], $config['subscribe_key'])
                );
            }
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
