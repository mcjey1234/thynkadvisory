<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use App\Models\Contact;
use Filament\Resources\Pages\Page;

class PrintContacts extends Page
{
    protected static string $resource = ContactResource::class;

    protected static string $view = 'filament.resources.contacts.pages.print-contacts';

    public $contacts;

    public function mount()
    {
        $this->contacts = Contact::orderBy('created_at', 'desc')->get();
    }
}