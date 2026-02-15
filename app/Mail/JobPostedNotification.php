<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobPostedNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Job $job)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
          to: [$this->job->employer->user->email],
          subject: "New Job: {$this->job->title}",
          replyTo: [$this->job->employer->user->email ?? config('mail.from.address')],
      );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails/job-posted',
            with: [
                'job' => $this->job,
            ],
        );
    }
}
