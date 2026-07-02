<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use App\Models\Contact;
use Filament\Resources\Pages\Page;

class PrintContact extends Page
{
    protected static string $resource = ContactResource::class;

    protected static string $view = 'filament.resources.contacts.pages.print-contact';

    public $contact;

    public function mount($record)
    {
        $this->contact = Contact::findOrFail($record);
    }
}