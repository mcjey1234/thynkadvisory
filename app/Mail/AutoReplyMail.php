<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AutoReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;      // ADD THIS
    public $aiReply;
    public $source;     // ADD THIS

    public function __construct($name, $email, $aiReply, $source = 'website')  // ADD $email
    {
        $this->name = $name;
        $this->email = $email;      // ADD THIS
        $this->aiReply = $aiReply;
        $this->source = $source;    // ADD THIS
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank you for contacting THYNK Advisory',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.auto-reply',
            with: [
                'name' => $this->name,
                'email' => $this->email,      // ADD THIS
                'aiReply' => $this->aiReply,
                'source' => $this->source,    // ADD THIS
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}