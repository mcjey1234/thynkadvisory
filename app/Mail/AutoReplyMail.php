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
    public $aiReply;

    public function __construct($name, $aiReply)
    {
        $this->name = $name;
        $this->aiReply = $aiReply;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank you for contacting Sofel Labs',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.auto-reply',
            with: [
                'name' => $this->name,
                'aiReply' => $this->aiReply,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}