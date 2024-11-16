<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Resident;
use Illuminate\Support\Facades\Log; // Import Log facade

class AccountApprovalNotification extends Mailable
{
   use Queueable, SerializesModels;

    public $subject;
    public $Body;

    public function __construct($subject, $Body)
    {
        $this->subject = $subject;
        $this->Body = $Body;

        // Log constructor arguments
        Log::info('Constructor arguments:', [
            'subject' => $this->subject,
            'Body' => $this->Body,
        ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // Log the subject being set in the envelope
        Log::info('Envelope subject:', ['subject' => $this->subject]);

        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Log the view being used for email content
        Log::info('Email view:', ['view' => 'email']);

        return new Content(
            view: 'email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // Log attachment information
        Log::info('Attachments:', ['attachments' => []]);

        return [];
    }
    
}
