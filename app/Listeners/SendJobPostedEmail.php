<?php

namespace App\Listeners;

use App\Events\JobPosted;
use App\Mail\JobPostedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendJobPostedEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(JobPosted $event): void
    {
        $job = $event->job;

        Mail::to($job->employer->user->email)
            ->send(new JobPostedNotification($job));
    }
}
