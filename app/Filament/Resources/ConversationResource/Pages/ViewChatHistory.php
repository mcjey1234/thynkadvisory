<?php

namespace App\Filament\Resources\ConversationResource\Pages;

use App\Filament\Resources\ConversationResource;
use App\Models\Contact;
use App\Models\Conversation;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;

class ViewChatHistory extends Page
{
    protected static string $resource = ConversationResource::class;

    protected static string $view = 'filament.resources.conversation-resource.pages.view-chat-history';

    public $contact;

    public function mount($contact): void
    {
        $this->contact = Contact::findOrFail($contact);
    }

    public function getTitle(): string
    {
        return 'Chat History: ' . $this->contact->name;
    }

    public function getBreadcrumbs(): array
    {
        return [
            route('filament.admin.resources.conversations.index') => 'AI Conversations',
            $this->getTitle(),
        ];
    }

    public function getContactId()
    {
        return $this->contact->id;
    }

    public function getConversations()
    {
        return Conversation::where('contact_id', $this->contact->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
