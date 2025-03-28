<?php

namespace App\Providers;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Http\Middleware;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->greeting('') // Removes "Hello!"
                ->subject( __('translation.welcomeToEmail'))
                ->line( __('translation.explainEmail'))
                ->action(__('translation.navigation_verify'), $url)
                ->salutation(''); // Removes "Best Regards, {{app_name}}"
        });

        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
            $event->extendSocialite('google', \SocialiteProviders\Google\Provider::class);
        });
    $this->app['router']->aliasMiddleware('localization', \App\Http\Middleware\Localization::class);    
    }
}
