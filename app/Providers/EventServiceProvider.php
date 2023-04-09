<?php

namespace App\Providers;

use App\Listeners\TelegramSubscriber;
use App\Models\Admin\Category;
use App\Models\Admin\Color;
use App\Models\Admin\Product;
use App\Models\Admin\Tag;
use App\Observers\Admin\CategoryObserver;
use App\Observers\Admin\ColorObserver;
use App\Observers\Admin\ProductObserver;
use App\Observers\Admin\TagObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $subscribe = [
        TelegramSubscriber::class
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        Tag::observe(TagObserver::class);
        Color::observe(ColorObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
