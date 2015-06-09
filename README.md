# PubNub Broadcasting Events Driver for Laravel

## Install Via Composer

```bash
composer require cwt137/laravel-pubnub-broadcast-driver
```

## Setup Laravel

Add the service provider `Cwt137\PubnubDriver\PubnubServiceProvider` in your `config/app.php` file. Then in the `.env` file, add the following API keys:

```bash
PUBNUB_PUBLISH_KEY={YOUR_PUBNUB_PUBLISH_KEY}
PUBNUB_SUBSCRIBE_KEY={YOUR_PUBNUB_SUBSCRIBE_KEY}
```

Where `{YOUR_PUBNUB_PUBLISH_KEY}` and `{YOUR_PUBNUB_SUBSCRIBE_KEY}` are your PubNub publish and subscribe keys, respectively.

Next in your `config/broadcasting.php` file, under the `connections` array, add the PubNub settings:

```php
        'pubnub' => [
            'driver' => 'pubnub',
            'publish_key' => env('PUBNUB_PUBLISH_KEY'),
            'subscribe_key' => env('PUBNUB_SUBSCRIBE_KEY'),
        ],
```

You probably want to change the defaut driver to `pubnub`.

## Using Driver

You can use `php artisan make:event {Name}` to make a Laravel Event. Inside the event, implement the `ShouldBroadcast` interface by declaring a `broadcastOn` method. In that method you should return an array of channels you want to broadcast on.

