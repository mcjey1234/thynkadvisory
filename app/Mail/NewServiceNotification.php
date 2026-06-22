<?php

namespace App\Mail;

use App\Models\Service;
use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewServiceNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $service;
    public $action;
    public $subscriber;
    public $unsubscribeLink;
    public $cleanDescription;

    public function __construct(Service $service, $action, Subscription $subscriber)
    {
        $this->service = $service;
        $this->action = $action;
        $this->subscriber = $subscriber;
        $this->unsubscribeLink = route('unsubscribe', ['email' => $subscriber->email]);
        
        // Clean description: strip HTML tags and limit length
        $this->cleanDescription = strip_tags($service->description);
        if (strlen($this->cleanDescription) > 200) {
            $this->cleanDescription = substr($this->cleanDescription, 0, 200) . '...';
        }
    }

    public function envelope(): Envelope
    {
        $actionText = $this->action === 'created' ? 'New' : 'Updated';
        return new Envelope(
            subject: $actionText . ' Service: ' . $this->service->title . ' - Sofel Labs',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.service-notification',
        );
    }
}
