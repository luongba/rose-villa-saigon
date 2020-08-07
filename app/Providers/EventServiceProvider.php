<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\AfterConfirmMembership' => [
            'App\Listeners\SendMailNotifyResultRegisterMembership',
        ],
        'App\Events\AfterBookingEvent' => [
            'App\Listeners\SendMailNotifyBookingEvent',
        ],
        'App\Events\AfterBookingParty' => [
            'App\Listeners\SendMailNotifyBookingParty',
        ],
        'App\Events\AfterBookingWellnessBeauty' => [
            'App\Listeners\SendMailNotifyBookingWellnessBeauty',
        ],
        'App\Events\AfterBookingRoom' => [
            'App\Listeners\SendMailNotifyBookingRoom',
        ],
        'App\Events\AfterConfirmBookingEvent' => [
            'App\Listeners\SendMailNotifyResultBookingEvent',
        ],
        'App\Events\AfterConfirmBookingParty' => [
            'App\Listeners\SendMailNotifyResultBookingParty',
        ],
        'App\Events\AfterConfirmBookingWellnessBeauty' => [
            'App\Listeners\SendMailNotifyResultBookingWellnessBeauty',
        ],
        'App\Events\AfterConfirmBookingRoom' => [
            'App\Listeners\SendMailNotifyResultBookingRoom',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
