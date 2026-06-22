<x-filament-panels::page>
    <div class="space-y-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4">
            <div class="flex items-center gap-4 flex-wrap">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $contact->name }}
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <span class="font-medium">Email:</span> {{ $contact->email }}
                        @if($contact->phone)
                            <span class="mx-2">·</span>
                            <span class="font-medium">Phone:</span> {{ $contact->phone }}
                        @endif
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-500 mt-1">
                        Total conversations: {{ $contact->conversations()->count() }}
                        <span class="mx-2">|</span>
                        Unread: <span class="text-red-600 font-medium">{{ $contact->conversations()->where('is_read', false)->count() }}</span>
                    </p>
                </div>
                <div class="flex gap-2">
                    <x-filament::button
                        color="info"
                        icon="heroicon-o-arrow-left"
                        tag="a"
                        href="{{ route('filament.admin.resources.conversations.index') }}"
                        size="sm"
                    >
                        Back to List
                    </x-filament::button>
                </div>
            </div>
        </div>

        {{ $this->table }}
    </div>
</x-filament-panels::page>
