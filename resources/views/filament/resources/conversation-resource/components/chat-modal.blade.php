<div class="space-y-4 p-2 max-h-[500px] overflow-y-auto">
    @if($conversations->isEmpty())
        <div class="p-4 text-gray-500 text-center">No conversations found for this contact.</div>
    @else
        @foreach($conversations as $conversation)
            @php
                $bgColor = $conversation->is_read ? 'bg-gray-50 dark:bg-gray-900' : 'bg-blue-50 dark:bg-blue-900/10';
                $readStatus = $conversation->is_read ? '✅ Read' : '🔴 Unread';
                $readColor = $conversation->is_read ? 'text-green-500' : 'text-red-500';
            @endphp
            
            <div class="border dark:border-gray-700 rounded-lg p-3 {{ $bgColor }}">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <p class="text-sm text-gray-700 dark:text-gray-300">
                            <strong>👤 User:</strong> {{ $conversation->user_message }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                            <strong>🤖 AI:</strong> {{ $conversation->ai_response }}
                        </p>
                    </div>
                    <div class="ml-4 text-right flex-shrink-0">
                        <span class="text-xs text-gray-500">{{ $conversation->created_at->format('M d, Y h:i A') }}</span>
                        <br>
                        <span class="text-xs {{ $readColor }}">{{ $readStatus }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
