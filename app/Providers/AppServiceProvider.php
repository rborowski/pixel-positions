<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Event;
use App\Listeners\SendVerificationEmail;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Mail\VerifyEmailNotification;

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
        Paginator::defaultView('vendor.pagination.tailwind');

        VerifyEmail::toMailUsing(function ($notifiable, $verificationUrl) {
          return (new VerifyEmailNotification(
              $verificationUrl,
              $notifiable->name,
          ))->to($notifiable->getEmailForVerification());
        });
    }
}
